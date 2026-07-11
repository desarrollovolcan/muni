<?php
require __DIR__ . '/app/bootstrap.php';

function ensure_public_map_projects_table(): void
{
    db()->exec("CREATE TABLE IF NOT EXISTS map_projects (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(180) NOT NULL,
        estado VARCHAR(40) NOT NULL DEFAULT 'Planificación',
        etapa VARCHAR(60) NOT NULL DEFAULT 'Diseño',
        sector VARCHAR(120) DEFAULT NULL,
        monto VARCHAR(80) DEFAULT NULL,
        financiamiento VARCHAR(160) DEFAULT NULL,
        inicio VARCHAR(80) DEFAULT NULL,
        entrega VARCHAR(80) DEFAULT NULL,
        foto TEXT DEFAULT NULL,
        fotos TEXT DEFAULT NULL,
        descripcion TEXT DEFAULT NULL,
        avance TINYINT UNSIGNED NOT NULL DEFAULT 0,
        lat DECIMAL(10,7) NOT NULL,
        lng DECIMAL(10,7) NOT NULL,
        ubicaciones TEXT DEFAULT NULL,
        visible TINYINT(1) NOT NULL DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");


    $stmt = db()->query("SHOW COLUMNS FROM map_projects LIKE 'ubicaciones'");
    if (!$stmt->fetch()) {
        db()->exec("ALTER TABLE map_projects ADD COLUMN ubicaciones TEXT DEFAULT NULL AFTER lng");
    }
}

ensure_public_map_projects_table();
$catalogs = ensure_project_catalogs();
$activeStatuses = array_values(array_filter($catalogs['statuses'] ?? [], static function (array $status): bool {
    return (int) ($status['activo'] ?? 0) === 1;
}));
$projects = db()->query('SELECT id, nombre, estado, etapa, sector, monto, financiamiento, inicio, entrega, foto, fotos, descripcion, avance, lat, lng, ubicaciones FROM map_projects WHERE visible = 1 ORDER BY nombre')->fetchAll();
$projectsJson = json_encode($projects, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$activeStatusesJson = json_encode(array_column($activeStatuses, 'nombre'), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mapa público de proyectos</title>
    <link href="assets/plugins/leaflet/leaflet.css" rel="stylesheet" type="text/css">
    <style>
        :root{
            --primary:#005eaa;
            --accent:#00a6c9;
            --civic-gold:#f2b705;
            --ink:#1f2937;
            --muted:#64748b;
            --soft:#f8fafc;
            --line:#e5e7eb;
            --panel:rgba(255,255,255,.92);
            --shadow:0 18px 42px rgba(15,23,42,.14);
        }
        *{box-sizing:border-box}
        html,body,#publicProjectMap{height:100%;margin:0;width:100%}
        body{background:#f8fafc;color:var(--ink);font-family:Inter,"Segoe UI",Arial,sans-serif;overflow:hidden}
        .screen-map{height:100vh;position:relative;width:100vw}
        #publicProjectMap{background:#eef4f8;filter:none}
        #publicProjectMap .leaflet-tile,#publicProjectMap .leaflet-layer{filter:none!important;opacity:1!important}
        .map-vignette{display:none;inset:0;pointer-events:none;position:absolute;z-index:410}
        .project-sidebar{background:#fff;border:1px solid #dbe7f1;border-top:5px solid var(--primary);border-radius:18px;box-shadow:var(--shadow);display:flex;flex-direction:column;height:calc(100vh - 36px);left:18px;overflow:hidden;position:absolute;top:18px;width:360px;z-index:620}
        .sidebar-head{background:#fff;border-bottom:1px solid #d9e6ef;padding:16px}
        .sidebar-brand{align-items:center;display:flex;gap:10px}
        .sidebar-brand img{height:30px;max-width:106px;object-fit:contain}
        .sidebar-brand h2{color:#0f2f4a;font-size:14px;font-weight:650;line-height:1.25;margin:0}
        .sidebar-brand p{color:var(--muted);font-size:12px;font-weight:400;margin:3px 0 0}
        .screen-counter{background:#005eaa;border:0;border-radius:999px;color:#fff;font-size:12px;font-weight:750;margin-left:auto;padding:6px 10px}
        .sidebar-summary{display:grid;gap:8px;grid-template-columns:1fr 1fr;margin-top:12px}
        .sidebar-filters{display:grid;gap:8px;margin-top:12px}
        .sidebar-filters input,.sidebar-filters select{background:#fff;border:1px solid var(--line);border-radius:8px;color:#334155;font:inherit;font-size:12px;outline:none;padding:9px 10px;width:100%}
        .sidebar-filters input:focus,.sidebar-filters select:focus{border-color:#8bb8d4;box-shadow:0 0 0 3px rgba(6,79,131,.10)}
        .summary-tile{background:#f7fbff;border:1px solid #dbe7f1;border-radius:12px;padding:10px}
        .summary-tile span{color:var(--muted);display:block;font-size:10px;font-weight:600;letter-spacing:.04em;text-transform:uppercase}
        .summary-tile strong{color:#0f2f4a;display:block;font-size:16px;font-weight:650;margin-top:3px}
        .project-list-title{align-items:center;color:var(--muted);display:flex;font-size:10px;font-weight:600;justify-content:space-between;margin-top:12px;text-transform:uppercase}
        .public-project-list{display:grid;gap:8px;overflow:auto;padding:9px}
        .public-project-list .empty-message{box-shadow:none;left:auto;position:static;top:auto;transform:none}
        .public-project-card{background:#fff;border:1px solid #dce7ef;border-left:4px solid transparent;border-radius:14px;box-shadow:0 8px 22px rgba(15,23,42,.06);cursor:pointer;display:grid;grid-template-columns:92px minmax(0,1fr);min-height:104px;overflow:hidden;text-align:left;transition:border-color .18s ease,background .18s ease,box-shadow .18s ease,transform .18s ease;width:100%}
        .public-project-card:hover,.public-project-card.active{background:#fdfefe;border-color:#8fc2e8;border-left-color:var(--primary);box-shadow:0 14px 30px rgba(0,94,170,.14);transform:translateY(-1px)}
        .public-project-card .map-slider{height:100%}
        .public-project-card .map-slider img{border-radius:12px 0 0 12px;height:100%!important;margin:0;min-height:104px}
        .public-card-body{align-content:center;display:grid;min-width:0;padding:9px 10px}
        .public-card-title{color:#0f2f4a;display:block;font-size:13px;font-weight:650;letter-spacing:-.01em;line-height:1.32;margin:7px 0 0}
        .tag{border:1px solid transparent;border-radius:8px;display:inline-flex;font-size:10px;font-weight:500;line-height:1;padding:4px 7px}
        .tag.en-ejecucion{background:#f0fdf4;border-color:#dcfce7;color:#166534}.tag.finalizado{background:#eff6ff;border-color:#dbeafe;color:#1e40af}.tag.planificacion,.tag.licitacion{background:#fffbeb;border-color:#fef3c7;color:#92400e}.tag.pausado{background:#fef2f2;border-color:#fee2e2;color:#991b1b}
        .screen-legend{background:#fff;border:1px solid #dbe7f1;border-radius:14px;bottom:20px;box-shadow:var(--shadow);display:flex;gap:11px;left:396px;padding:10px 12px;position:absolute;z-index:520}.screen-legend span{align-items:center;color:#475569;display:flex;font-size:12px;font-weight:500;gap:6px}.dot{border-radius:50%;display:inline-block;height:8px;width:8px}
        .map-slider{display:block;position:relative}.map-slider img{background:#f8fafc;border-radius:9px;height:128px;margin-bottom:0;object-fit:cover;width:100%}.slider-btn{background:rgba(15,23,42,.46);border:0;border-radius:8px;color:#fff;display:grid;font-size:14px;height:22px;place-items:center;position:absolute;top:50%;transform:translateY(-50%);width:22px;z-index:2}.slider-btn.prev{left:7px}.slider-btn.next{right:7px}.slider-dots{bottom:8px;display:flex;gap:4px;justify-content:center;left:0;position:absolute;right:0}.slider-dots i{background:rgba(255,255,255,.72);border-radius:50%;height:5px;width:5px}
        .leaflet-popup-content-wrapper{border-radius:9px;box-shadow:0 12px 26px rgba(15,23,42,.12)}.leaflet-popup-content{margin:12px;min-width:270px}.leaflet-container a.leaflet-popup-close-button{background:#f8fafc;border-radius:8px;color:#64748b;height:24px;line-height:22px;right:8px;top:8px;width:24px}.popup-actions{margin-top:11px}.popup-detail-btn{align-items:center;background:var(--primary);border:0;border-radius:8px;box-shadow:none;color:#fff;cursor:pointer;display:inline-flex;font-size:12px;font-weight:500;justify-content:center;padding:9px 12px;text-decoration:none;width:100%}.popup-detail-btn:hover{background:#053f69}.popup-title{color:#0f2f4a;font-size:13px;font-weight:650;line-height:1.35;margin:9px 0 7px}.popup-meta{color:#64748b;font-size:12px;line-height:1.55}.popup-meta b{color:#475569;font-weight:500}
        .empty-message{background:var(--panel);border:1px solid var(--line);border-radius:9px;box-shadow:var(--shadow);left:calc(50% + 170px);padding:20px;position:absolute;text-align:center;top:50%;transform:translate(-50%,-50%);z-index:630}
        .project-detail-drawer{background:#fff;border:1px solid #dbe7f1;border-radius:18px;box-shadow:var(--shadow);display:flex;flex-direction:column;height:calc(100vh - 36px);max-width:430px;opacity:0;overflow:hidden;position:absolute;right:18px;top:18px;transform:translateX(108%);transition:transform .24s ease,opacity .24s ease;width:min(410px,calc(100vw - 24px));z-index:660}.project-detail-drawer.open{opacity:1;transform:translateX(0)}
        .detail-head{background:rgba(255,255,255,.72);border-bottom:1px solid var(--line);color:#111827;padding:15px 16px;position:relative}.detail-head-main{align-items:flex-start;display:flex;gap:12px;justify-content:space-between}.detail-kicker{color:var(--muted);display:block;font-size:10px;font-weight:600;letter-spacing:.08em;text-transform:uppercase}.detail-head h2{color:#0f2f4a;font-size:15px;font-weight:650;line-height:1.35;margin:5px 0 0}.detail-close{background:#fff;border:1px solid var(--line);border-radius:8px;color:#64748b;cursor:pointer;font-size:20px;height:32px;line-height:1;width:32px}.detail-body{overflow:auto;padding:14px 15px 18px}.detail-body .map-slider img{height:196px!important}.detail-status-row{align-items:center;display:flex;gap:10px;justify-content:space-between;margin:13px 0}.detail-status-row strong{color:#475569;font-size:12px;font-weight:500}.detail-progress{background:#f1f5f9;border-radius:8px;height:6px;overflow:hidden}.detail-progress span{background:var(--primary);display:block;height:100%}.detail-grid{display:grid;gap:8px;grid-template-columns:1fr 1fr;margin-top:13px}.detail-item{background:#fff;border:1px solid var(--line);border-radius:8px;box-shadow:none;padding:9px 10px}.detail-item.wide{grid-column:1/-1}.detail-label{color:var(--muted);display:block;font-size:10px;font-weight:600;letter-spacing:.04em;text-transform:uppercase}.detail-value{color:#334155;display:block;font-size:12px;font-weight:500;margin-top:4px}.detail-description{background:#fff;border:1px solid var(--line);border-radius:8px;color:#64748b;font-size:12px;line-height:1.6;margin-top:12px;padding:12px;white-space:pre-line}.leaflet-control-zoom{border:0!important;box-shadow:var(--shadow)!important}.leaflet-control-zoom a{border:0!important;color:#334155!important}
        @media(max-width:900px){
            html,body,#publicProjectMap{height:100%;overflow:hidden}
            body{background:#eef4f8}
            .screen-map{background:#eef4f8;height:100vh;height:100dvh;overflow:hidden;width:100%}
            #publicProjectMap{filter:none;height:100%;width:100%}
            .map-vignette{display:none}
            .project-sidebar{background:transparent;border:0;border-radius:0;box-shadow:none;height:auto;inset:0;overflow:visible;pointer-events:none;position:absolute;width:auto;z-index:640}
            .sidebar-head{background:#fff;border:1px solid #dbe7f1;border-top:5px solid #005eaa;border-radius:18px;box-shadow:0 16px 36px rgba(15,23,42,.18);left:12px;padding:13px;pointer-events:auto;position:absolute;right:12px;top:12px}
            .sidebar-head::after{display:none}
            .sidebar-head>*{position:relative;z-index:1}
            .sidebar-brand{align-items:center;gap:10px}
            .sidebar-brand img{background:#fff;border:1px solid #dbe7f1;border-radius:12px;box-shadow:none;height:34px;max-width:98px;object-fit:contain;padding:5px}
            .sidebar-brand h2{color:#0f2f4a;font-size:16px;font-weight:750;letter-spacing:-.02em;text-shadow:none}
            .sidebar-brand p{display:none}
            .screen-counter{background:#005eaa;border:0;border-radius:999px;box-shadow:none;color:#fff;font-size:12px;font-weight:800;margin-left:auto;padding:6px 10px}
            .sidebar-summary{display:none}
            .sidebar-filters{gap:8px;grid-template-columns:minmax(0,1fr) minmax(128px,39%);margin-top:12px}
            .sidebar-filters input,.sidebar-filters select{background:#f8fbfe;border:1px solid #c8ddeb;border-radius:12px;box-shadow:none;color:#0f2f4a;font-size:13px;font-weight:650;min-height:44px;padding:11px 12px}
            .sidebar-filters input::placeholder{color:#54708f}
            .sidebar-filters input:focus,.sidebar-filters select:focus{border-color:#005eaa;box-shadow:0 0 0 3px rgba(0,94,170,.16)}
            .project-list-title{color:#475569;font-size:10px;margin-top:10px}
            .public-project-list{bottom:14px;display:grid;gap:12px;grid-auto-columns:min(84vw,330px);grid-auto-flow:column;left:0;overflow-x:auto;overflow-y:hidden;padding:0 14px 6px;pointer-events:auto;position:absolute;right:0;scroll-padding:14px;scroll-snap-type:x mandatory;-webkit-overflow-scrolling:touch}
            .public-project-list::-webkit-scrollbar{display:none}
            .public-project-card{background:#fff;border:1px solid #dbe7f1;border-left:6px solid #005eaa;border-radius:18px;box-shadow:0 16px 34px rgba(15,23,42,.18);grid-template-columns:100px minmax(0,1fr);min-height:112px;scroll-snap-align:center;transform:translateY(0)}
            .public-project-card:hover,.public-project-card.active{border-color:#005eaa;border-left-color:#f2b705;box-shadow:0 18px 38px rgba(0,94,170,.22);transform:translateY(-2px)}
            .public-project-card .map-slider img{border-radius:13px 0 0 13px;min-height:112px}
            .public-card-body{padding:12px 13px}
            .public-card-title{color:#0f2f4a;font-size:14px;font-weight:750;line-height:1.25}
            .tag{border-radius:999px;font-size:10px;font-weight:800;padding:5px 8px;text-transform:uppercase}
            .tag.en-ejecucion{background:#dcfce7;border-color:#86efac;color:#15803d}.tag.finalizado{background:#dbeafe;border-color:#93c5fd;color:#075985}.tag.planificacion,.tag.licitacion{background:#fef3c7;border-color:#facc15;color:#92400e}.tag.pausado{background:#fee2e2;border-color:#fca5a5;color:#b91c1c}
            .leaflet-control-zoom{display:none}
            .leaflet-popup-content{min-width:min(260px,calc(100vw - 64px))}
            .screen-legend{display:none}
            .project-detail-drawer{background:#fff;border:0;border-radius:22px 22px 0 0;bottom:0;box-shadow:0 -18px 38px rgba(15,23,42,.24);height:min(78dvh,600px);max-width:none;position:fixed;right:0;top:auto;width:100%;z-index:900}
            .detail-head{background:#005eaa;padding:15px 16px}.detail-kicker,.detail-head h2{color:#fff}.detail-close{border:0;color:#005eaa}
            .detail-body{padding:14px 15px 20px}.detail-grid{grid-template-columns:1fr}.empty-message{background:#fff;box-shadow:0 16px 36px rgba(15,23,42,.20);left:12px;right:12px;top:52%;transform:translateY(-50%);width:auto}
        }
        @media(max-width:520px){
            .sidebar-head{left:10px;right:10px;top:10px}
            .sidebar-brand h2{font-size:14px}
            .sidebar-filters{grid-template-columns:1fr}
            .project-list-title{display:none}
            .public-project-list{bottom:10px;grid-auto-columns:88vw;padding:0 10px 5px}
            .public-project-card{grid-template-columns:90px minmax(0,1fr);min-height:104px}
            .public-project-card .map-slider img{min-height:104px}
            .public-card-title{font-size:13px}
            .tag{font-size:9px}
            .detail-body .map-slider img{height:170px!important}
        }
        @media print{.project-sidebar,.screen-legend,.project-detail-drawer{display:none}}
    </style>
</head>
<body>
    <main class="screen-map">
        <div id="publicProjectMap"></div>
        <aside class="project-sidebar" id="projectSidebar">
            <div class="sidebar-head">
                <div class="sidebar-brand">
                    <img src="assets/images/logo.png" alt="Municipalidad">
                    <div>
                        <h2>Proyectos comunales</h2>
                        <p>Seleccione una iniciativa en el listado o en el mapa.</p>
                    </div>
                    <strong class="screen-counter" id="projectCounter">0</strong>
                </div>
                <div class="sidebar-summary">
                    <div class="summary-tile"><span>Visibles</span><strong id="visibleMetric">0</strong></div>
                    <div class="summary-tile"><span>En ejecución</span><strong id="activeMetric">0</strong></div>
                </div>
                <div class="sidebar-filters" aria-label="Filtros de proyectos">
                    <input id="projectSearch" type="search" placeholder="Buscar proyecto o sector" autocomplete="off">
                    <select id="projectStatusFilter">
                        <option value="">Todos los estados activos</option>
                        <?php foreach ($activeStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status['nombre'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($status['nombre'], ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="project-list-title"><span>Listado público</span><span id="projectListCount">0</span></div>
            </div>
            <div class="public-project-list" id="publicProjectList"></div>
        </aside>
        <section class="screen-legend" id="screenLegend">
            <span><i class="dot" style="background:#4caf50"></i> En ejecución</span>
            <span><i class="dot" style="background:#0f5fa8"></i> Finalizado</span>
            <span><i class="dot" style="background:#ffa52d"></i> Planificación / Licitación</span>
            <span><i class="dot" style="background:#ef5350"></i> Pausado</span>
        </section>
        <div class="empty-message" id="emptyMessage" hidden>No hay proyectos visibles para mostrar.</div>
        <aside class="project-detail-drawer" id="projectDetailDrawer" aria-hidden="true">
            <div class="detail-head">
                <div class="detail-head-main">
                    <div>
                        <span class="detail-kicker">Detalle del proyecto</span>
                        <h2 id="detailTitle">Seleccione un proyecto</h2>
                    </div>
                    <button class="detail-close" id="detailClose" type="button" aria-label="Cerrar detalle">×</button>
                </div>
            </div>
            <div class="detail-body" id="detailBody"></div>
        </aside>
    </main>
    <script src="assets/plugins/leaflet/leaflet.js"></script>
    <script>
        const projects = <?php echo $projectsJson ?: '[]'; ?>;
        const activeStatuses = <?php echo $activeStatusesJson ?: '[]'; ?>;
        const fallbackPhoto = 'assets/images/logo.png';
        const map = L.map('publicProjectMap', {zoomControl: false}).setView([-20.2595, -69.7863], 13);
        const markers = new Map();
        const publicProjectList = document.getElementById('publicProjectList');
        const detailDrawer = document.getElementById('projectDetailDrawer');
        const detailTitle = document.getElementById('detailTitle');
        const detailBody = document.getElementById('detailBody');
        const projectSearch = document.getElementById('projectSearch');
        const projectStatusFilter = document.getElementById('projectStatusFilter');
        L.control.zoom({position: 'bottomright'}).addTo(map);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: '&copy; OpenStreetMap'}).addTo(map);

        function escapeHtml(value) { return String(value ?? '').replace(/[&<>\"']/g, character => ({'&':'&amp;','<':'&lt;','>':'&gt;','\"':'&quot;',"'":'&#039;'}[character])); }
        function slug(value) { return (value || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/\s+/g, '-'); }
        function markerColor(status) { return {'En ejecución':'#18a957','Finalizado':'#006fba','Pausado':'#ef4444'}[status] || '#ffbd2e'; }
        function icon(status) { const color = markerColor(status); return L.divIcon({className: '', html: `<span style="display:block;width:28px;height:28px;border-radius:50% 50% 50% 0;background:${color};border:5px solid #fff;box-shadow:0 10px 22px rgba(2,32,71,.26);transform:rotate(-45deg);position:relative"><i style="background:#fff;border-radius:50%;height:7px;left:6px;position:absolute;top:6px;width:7px"></i></span>`, iconSize: [34, 44], iconAnchor: [17, 42], popupAnchor: [0, -38]}); }
        function getLocations(project) {
            try {
                const parsed = JSON.parse(project.ubicaciones || '[]');
                if (Array.isArray(parsed)) {
                    const clean = parsed.map(item => [Number(item.lat), Number(item.lng)]).filter(item => Number.isFinite(item[0]) && Number.isFinite(item[1]));
                    if (clean.length) return clean;
                }
            } catch (error) {}
            return [[Number(project.lat), Number(project.lng)]].filter(item => Number.isFinite(item[0]) && Number.isFinite(item[1]));
        }
        function getPhotos(project) { try { const parsed = JSON.parse(project.fotos || '[]'); if (Array.isArray(parsed)) { const clean = parsed.filter(photo => typeof photo === 'string' && photo.trim() !== ''); if (clean.length) return clean; } } catch (error) {} return project.foto && String(project.foto).trim() !== '' ? [project.foto] : [fallbackPhoto]; }
        function sliderHtml(project, imageHeight = 150) { const photos = getPhotos(project); const controls = photos.length > 1 ? `<button class="slider-btn prev" data-slider-dir="-1" type="button">‹</button><button class="slider-btn next" data-slider-dir="1" type="button">›</button><span class="slider-dots">${photos.map(() => '<i></i>').join('')}</span>` : ''; return `<span class="map-slider" data-slider-index="0" data-photos="${encodeURIComponent(JSON.stringify(photos))}"><img style="height:${imageHeight}px" src="${photos[0] || fallbackPhoto}" alt="">${controls}</span>`; }
        function popup(project) { return `${sliderHtml(project, 148)}<div class="popup-title">${escapeHtml(project.nombre)}</div><div class="popup-meta"><b>Estado:</b> ${escapeHtml(project.estado)}<br><b>Etapa:</b> ${escapeHtml(project.etapa)}<br><b>Sector:</b> ${escapeHtml(project.sector || '-')}<br><b>Avance:</b> ${Number(project.avance) || 0}%</div><div class="popup-actions"><button class="popup-detail-btn" type="button" data-detail-id="${project.id}">Ver más detalle</button></div>`; }
        function cardHtml(project) { return `<article class="public-project-card" role="button" tabindex="0" aria-label="Ver ${escapeHtml(project.nombre)}" data-id="${project.id}">${sliderHtml(project, 112)}<div class="public-card-body"><span class="tag ${slug(project.estado)}">${escapeHtml(project.estado)}</span><strong class="public-card-title">${escapeHtml(project.nombre)}</strong></div></article>`; }
        function focus(project) {
            let activeCard = null;
            document.querySelectorAll('.public-project-card').forEach(card => {
                const isActive = String(card.dataset.id) === String(project.id);
                card.classList.toggle('active', isActive);
                if (isActive) activeCard = card;
            });
            if (activeCard && window.matchMedia('(max-width: 900px)').matches) {
                activeCard.scrollIntoView({behavior: 'smooth', block: 'nearest', inline: 'center'});
            }
        }
        function detailItem(label, value, wide = false) { return `<div class="detail-item${wide ? ' wide' : ''}"><span class="detail-label">${label}</span><span class="detail-value">${escapeHtml(value || '-')}</span></div>`; }
        function openProjectDetail(project) {
            if (!project) return;
            detailTitle.textContent = project.nombre || 'Proyecto';
            detailBody.innerHTML = `${sliderHtml(project, 210)}<div class="detail-status-row"><span class="tag ${slug(project.estado)}">${escapeHtml(project.estado)}</span><strong>${Number(project.avance) || 0}% de avance</strong></div><div class="detail-progress"><span style="width:${Number(project.avance) || 0}%"></span></div><div class="detail-grid">${detailItem('Etapa', project.etapa)}${detailItem('Sector', project.sector)}${detailItem('Monto', project.monto)}${detailItem('Financiamiento', project.financiamiento)}${detailItem('Inicio', project.inicio)}${detailItem('Entrega', project.entrega)}</div><div class="detail-description">${escapeHtml(project.descripcion || 'Sin descripción disponible.')}</div>`;
            detailDrawer.classList.add('open');
            detailDrawer.setAttribute('aria-hidden', 'false');
        }
        function closeProjectDetail() { detailDrawer.classList.remove('open'); detailDrawer.setAttribute('aria-hidden', 'true'); }
        function closeMapOverlays() { closeProjectDetail(); map.closePopup(); document.querySelectorAll('.public-project-card').forEach(card => card.classList.remove('active')); }

        function matchesFilters(project) {
            const search = (projectSearch.value || '').trim().toLowerCase();
            const status = projectStatusFilter.value;
            const searchable = [project.nombre, project.estado, project.sector, project.etapa].join(' ').toLowerCase();
            return activeStatuses.includes(project.estado) && (!status || project.estado === status) && (!search || searchable.includes(search));
        }
        function updateProjectMetrics(visibleProjects) {
            document.getElementById('projectCounter').textContent = String(visibleProjects.length);
            document.getElementById('projectListCount').textContent = `${visibleProjects.length} proyectos`;
            document.getElementById('visibleMetric').textContent = String(visibleProjects.length);
            document.getElementById('activeMetric').textContent = String(visibleProjects.filter(project => project.estado === 'En ejecución').length);
            document.getElementById('emptyMessage').hidden = projects.length > 0;
        }
        function renderProjectList() {
            const visibleProjects = projects.filter(matchesFilters);
            publicProjectList.innerHTML = visibleProjects.length ? visibleProjects.map(cardHtml).join('') : '<div class="empty-message">No hay proyectos para los filtros seleccionados.</div>';
            markers.forEach((marker, id) => {
                const project = projects.find(item => String(item.id) === String(id));
                const shouldShow = project && visibleProjects.some(item => String(item.id) === String(id));
                marker.forEach(item => {
                    if (shouldShow && !map.hasLayer(item)) item.addTo(map);
                    if (!shouldShow && map.hasLayer(item)) map.removeLayer(item);
                });
            });
            updateProjectMetrics(visibleProjects);
            if (visibleProjects.length && !document.querySelector('.public-project-card.active')) focus(visibleProjects[0]);
        }
        const bounds = [];
        projects.forEach(project => {
            const projectMarkers = getLocations(project).map(latlng => {
                bounds.push(latlng);
                return L.marker(latlng, {icon: icon(project.estado)}).addTo(map).bindPopup(popup(project)).on('click', () => focus(project));
            });
            markers.set(String(project.id), projectMarkers);
        });
        function fitMapToProjects() {
            if (!bounds.length) return;
            const isMobile = window.matchMedia('(max-width: 900px)').matches;
            map.fitBounds(bounds, {
                paddingTopLeft: isMobile ? [28, 150] : [376, 36],
                paddingBottomRight: isMobile ? [28, 140] : [90, 90],
                maxZoom: 15
            });
        }
        fitMapToProjects();
        window.addEventListener('resize', () => {
            map.invalidateSize();
            fitMapToProjects();
        });
        renderProjectList();
        projectSearch.addEventListener('input', renderProjectList);
        projectStatusFilter.addEventListener('change', renderProjectList);

        function openProjectFromCard(card) {
            const project = projects.find(item => String(item.id) === String(card.dataset.id));
            const marker = markers.get(String(card.dataset.id));
            if (!project || !marker || !marker[0]) return;
            focus(project);
            if (window.matchMedia('(max-width: 900px)').matches) {
                document.getElementById('publicProjectMap').scrollIntoView({behavior: 'smooth', block: 'start'});
            }
            map.flyTo(marker[0].getLatLng(), 16, {duration: .8});
            marker[0].openPopup();
            openProjectDetail(project);
        }

        publicProjectList.addEventListener('click', event => {
            const card = event.target.closest('.public-project-card');
            if (!card || event.target.closest('[data-slider-dir]')) return;
            event.stopPropagation();
            openProjectFromCard(card);
        });
        publicProjectList.addEventListener('keydown', event => {
            const card = event.target.closest('.public-project-card');
            if (!card || !['Enter', ' '].includes(event.key)) return;
            event.preventDefault();
            openProjectFromCard(card);
        });

        function advanceSlider(slider, direction = 1) {
            const photos = JSON.parse(decodeURIComponent(slider.dataset.photos || '%5B%5D'));
            if (photos.length <= 1) return;
            let index = Number(slider.dataset.sliderIndex || 0);
            index = (index + direction + photos.length) % photos.length;
            slider.dataset.sliderIndex = String(index);
            slider.querySelector('img').src = photos[index];
        }

        setInterval(() => {
            document.querySelectorAll('[data-photos]').forEach(slider => advanceSlider(slider, 1));
        }, 4500);

        document.getElementById('detailClose').addEventListener('click', event => { event.stopPropagation(); closeProjectDetail(); });
        detailDrawer.addEventListener('click', event => event.stopPropagation());
        document.getElementById('projectSidebar').addEventListener('click', event => event.stopPropagation());
        document.getElementById('screenLegend').addEventListener('click', event => event.stopPropagation());
        map.on('click', closeMapOverlays);
        map.on('popupclose', closeProjectDetail);

        document.addEventListener('click', event => {
            const detailButton = event.target.closest('[data-detail-id]');
            if (detailButton) {
                event.preventDefault();
                event.stopPropagation();
                const project = projects.find(item => String(item.id) === String(detailButton.dataset.detailId));
                openProjectDetail(project);
                return;
            }
            const button = event.target.closest('[data-slider-dir]');
            if (button) {
                event.preventDefault();
                event.stopPropagation();
                const slider = button.closest('[data-photos]');
                advanceSlider(slider, Number(button.dataset.sliderDir));
                return;
            }
            if (!event.target.closest('.leaflet-popup') && !event.target.closest('.leaflet-marker-icon')) {
                closeMapOverlays();
            }
        });
    </script>
</body>
</html>
