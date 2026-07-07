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
        visible TINYINT(1) NOT NULL DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}

ensure_public_map_projects_table();
$projects = db()->query('SELECT id, nombre, estado, etapa, sector, monto, financiamiento, inicio, entrega, foto, fotos, descripcion, avance, lat, lng FROM map_projects WHERE visible = 1 ORDER BY nombre')->fetchAll();
$projectsJson = json_encode($projects, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
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
            --primary:#1f5f9f;
            --accent:#0f766e;
            --ink:#1f2937;
            --muted:#64748b;
            --soft:#f8fafc;
            --line:#e5e7eb;
            --panel:rgba(255,255,255,.88);
            --shadow:0 10px 28px rgba(15,23,42,.08);
        }
        *{box-sizing:border-box}
        html,body,#publicProjectMap{height:100%;margin:0;width:100%}
        body{background:#f8fafc;color:var(--ink);font-family:Inter,"Segoe UI",Arial,sans-serif;overflow:hidden}
        .screen-map{height:100vh;position:relative;width:100vw}
        #publicProjectMap{background:#f1f5f9;filter:saturate(.72) contrast(.94) brightness(1.02)}
        .map-vignette{background:linear-gradient(90deg,rgba(248,250,252,.78),rgba(248,250,252,.22) 28%,transparent 56%);inset:0;pointer-events:none;position:absolute;z-index:410}
        .project-sidebar,.project-detail-drawer,.screen-legend,.civic-header{backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px)}
        .civic-header{align-items:center;background:var(--panel);border:1px solid var(--line);border-radius:9px;box-shadow:var(--shadow);display:flex;gap:12px;left:50%;max-width:min(640px,calc(100vw - 640px));min-width:340px;padding:10px 12px;position:absolute;top:18px;transform:translateX(-50%);z-index:590}
        .civic-seal{align-items:center;background:#fff;border:1px solid var(--line);border-radius:8px;display:flex;height:40px;justify-content:center;min-width:40px;padding:6px}
        .civic-seal img{max-height:28px;max-width:82px;object-fit:contain}
        .civic-copy small{color:var(--muted);display:block;font-size:10px;font-weight:600;letter-spacing:.08em;text-transform:uppercase}
        .civic-copy h1{color:#111827;font-size:14px;font-weight:600;line-height:1.25;margin:2px 0}
        .civic-copy p{color:var(--muted);font-size:12px;margin:0}
        .project-sidebar{background:var(--panel);border:1px solid var(--line);border-radius:9px;box-shadow:var(--shadow);display:flex;flex-direction:column;height:calc(100vh - 36px);left:18px;overflow:hidden;position:absolute;top:18px;width:310px;z-index:620}
        .sidebar-head{background:rgba(255,255,255,.68);border-bottom:1px solid var(--line);padding:14px}
        .sidebar-brand{align-items:center;display:flex;gap:10px}
        .sidebar-brand img{height:30px;max-width:106px;object-fit:contain}
        .sidebar-brand h2{color:#111827;font-size:13px;font-weight:600;line-height:1.25;margin:0}
        .sidebar-brand p{color:var(--muted);font-size:12px;font-weight:400;margin:3px 0 0}
        .screen-counter{background:#f8fafc;border:1px solid var(--line);border-radius:8px;color:#334155;font-size:12px;font-weight:500;margin-left:auto;padding:5px 8px}
        .sidebar-summary{display:grid;gap:8px;grid-template-columns:1fr 1fr;margin-top:12px}
        .summary-tile{background:#fff;border:1px solid var(--line);border-radius:8px;padding:9px}
        .summary-tile span{color:var(--muted);display:block;font-size:10px;font-weight:600;letter-spacing:.04em;text-transform:uppercase}
        .summary-tile strong{color:#111827;display:block;font-size:15px;font-weight:600;margin-top:3px}
        .project-list-title{align-items:center;color:var(--muted);display:flex;font-size:10px;font-weight:600;justify-content:space-between;margin-top:12px;text-transform:uppercase}
        .public-project-list{display:grid;gap:8px;overflow:auto;padding:9px}
        .public-project-card{background:rgba(255,255,255,.82);border:1px solid var(--line);border-radius:9px;box-shadow:none;cursor:pointer;display:grid;grid-template-columns:74px minmax(0,1fr);min-height:104px;overflow:hidden;text-align:left;transition:border-color .18s ease,background .18s ease,box-shadow .18s ease;width:100%}
        .public-project-card:hover,.public-project-card.active{background:#fff;border-color:#cbd5e1;box-shadow:0 8px 20px rgba(15,23,42,.06)}
        .public-project-card .map-slider{height:100%}
        .public-project-card .map-slider img{border-radius:9px 0 0 9px;height:100%!important;margin:0;min-height:104px}
        .public-card-body{min-width:0;padding:9px 10px}
        .public-card-title{color:#334155;display:block;font-size:12px;font-weight:500;line-height:1.38;margin:6px 0}
        .public-card-meta{color:#64748b;display:block;font-size:12px;font-weight:400;line-height:1.42}
        .public-card-meta b{color:#475569;font-weight:500}
        .tag{border:1px solid transparent;border-radius:8px;display:inline-flex;font-size:10px;font-weight:500;line-height:1;padding:4px 7px}
        .tag.en-ejecucion{background:#f0fdf4;border-color:#dcfce7;color:#166534}.tag.finalizado{background:#eff6ff;border-color:#dbeafe;color:#1e40af}.tag.planificacion,.tag.licitacion{background:#fffbeb;border-color:#fef3c7;color:#92400e}.tag.pausado{background:#fef2f2;border-color:#fee2e2;color:#991b1b}
        .progress{background:#f1f5f9;border-radius:8px;display:block;height:4px;margin-top:8px;overflow:hidden}.progress span{background:#64748b;display:block;height:100%}
        .screen-legend{background:var(--panel);border:1px solid var(--line);border-radius:9px;bottom:20px;box-shadow:var(--shadow);display:flex;gap:11px;left:348px;padding:9px 11px;position:absolute;z-index:520}.screen-legend span{align-items:center;color:#475569;display:flex;font-size:12px;font-weight:500;gap:6px}.dot{border-radius:50%;display:inline-block;height:8px;width:8px}
        .map-slider{display:block;position:relative}.map-slider img{background:#f8fafc;border-radius:9px;height:128px;margin-bottom:0;object-fit:cover;width:100%}.slider-btn{background:rgba(15,23,42,.46);border:0;border-radius:8px;color:#fff;display:grid;font-size:14px;height:22px;place-items:center;position:absolute;top:50%;transform:translateY(-50%);width:22px;z-index:2}.slider-btn.prev{left:7px}.slider-btn.next{right:7px}.slider-dots{bottom:8px;display:flex;gap:4px;justify-content:center;left:0;position:absolute;right:0}.slider-dots i{background:rgba(255,255,255,.72);border-radius:50%;height:5px;width:5px}
        .leaflet-popup-content-wrapper{border-radius:9px;box-shadow:0 12px 26px rgba(15,23,42,.12)}.leaflet-popup-content{margin:12px;min-width:270px}.leaflet-container a.leaflet-popup-close-button{background:#f8fafc;border-radius:8px;color:#64748b;height:24px;line-height:22px;right:8px;top:8px;width:24px}.popup-actions{margin-top:11px}.popup-detail-btn{align-items:center;background:#1f5f9f;border:0;border-radius:8px;box-shadow:none;color:#fff;cursor:pointer;display:inline-flex;font-size:12px;font-weight:500;justify-content:center;padding:9px 12px;text-decoration:none;width:100%}.popup-detail-btn:hover{background:#174a7c}.popup-title{color:#334155;font-size:12px;font-weight:500;line-height:1.38;margin:9px 0 7px}.popup-meta{color:#64748b;font-size:12px;line-height:1.55}.popup-meta b{color:#475569;font-weight:500}
        .empty-message{background:var(--panel);border:1px solid var(--line);border-radius:9px;box-shadow:var(--shadow);left:calc(50% + 170px);padding:20px;position:absolute;text-align:center;top:50%;transform:translate(-50%,-50%);z-index:630}
        .project-detail-drawer{background:var(--panel);border:1px solid var(--line);border-radius:9px;box-shadow:var(--shadow);display:flex;flex-direction:column;height:calc(100vh - 36px);max-width:410px;opacity:0;overflow:hidden;position:absolute;right:18px;top:18px;transform:translateX(108%);transition:transform .24s ease,opacity .24s ease;width:min(390px,calc(100vw - 24px));z-index:660}.project-detail-drawer.open{opacity:1;transform:translateX(0)}
        .detail-head{background:rgba(255,255,255,.72);border-bottom:1px solid var(--line);color:#111827;padding:15px 16px;position:relative}.detail-head-main{align-items:flex-start;display:flex;gap:12px;justify-content:space-between}.detail-kicker{color:var(--muted);display:block;font-size:10px;font-weight:600;letter-spacing:.08em;text-transform:uppercase}.detail-head h2{color:#334155;font-size:13px;font-weight:500;line-height:1.35;margin:5px 0 0}.detail-close{background:#fff;border:1px solid var(--line);border-radius:8px;color:#64748b;cursor:pointer;font-size:20px;height:32px;line-height:1;width:32px}.detail-body{overflow:auto;padding:14px 15px 18px}.detail-body .map-slider img{height:196px!important}.detail-status-row{align-items:center;display:flex;gap:10px;justify-content:space-between;margin:13px 0}.detail-status-row strong{color:#475569;font-size:12px;font-weight:500}.detail-progress{background:#f1f5f9;border-radius:8px;height:6px;overflow:hidden}.detail-progress span{background:#64748b;display:block;height:100%}.detail-grid{display:grid;gap:8px;grid-template-columns:1fr 1fr;margin-top:13px}.detail-item{background:#fff;border:1px solid var(--line);border-radius:8px;box-shadow:none;padding:9px 10px}.detail-item.wide{grid-column:1/-1}.detail-label{color:var(--muted);display:block;font-size:10px;font-weight:600;letter-spacing:.04em;text-transform:uppercase}.detail-value{color:#334155;display:block;font-size:12px;font-weight:500;margin-top:4px}.detail-description{background:#fff;border:1px solid var(--line);border-radius:8px;color:#64748b;font-size:12px;line-height:1.6;margin-top:12px;padding:12px;white-space:pre-line}.leaflet-control-zoom{border:0!important;box-shadow:var(--shadow)!important}.leaflet-control-zoom a{border:0!important;color:#334155!important}
        @media(max-width:1180px){.civic-header{display:none}}
        @media(max-width:900px){.project-sidebar{border-radius:0 0 9px 9px;height:44vh;left:0;top:0;width:100%}.public-project-list{grid-auto-flow:column;grid-auto-columns:240px;overflow-x:auto;overflow-y:hidden}.project-detail-drawer{border-radius:9px 9px 0 0;bottom:0;height:62vh;max-width:none;right:12px;top:auto;width:calc(100vw - 24px)}.detail-grid{grid-template-columns:1fr}.screen-legend{bottom:12px;left:12px;right:12px;flex-wrap:wrap}.empty-message{left:50%;top:65%}}
        @media print{.project-sidebar,.screen-legend,.project-detail-drawer,.civic-header{display:none}}
    </style>
</head>
<body>
    <main class="screen-map">
        <div id="publicProjectMap"></div>
        <div class="map-vignette" aria-hidden="true"></div>
        <header class="civic-header">
            <div class="civic-seal"><img src="assets/images/logo.png" alt="Municipalidad"></div>
            <div class="civic-copy">
                <small>Municipalidad</small>
                <h1>Mapa público de inversión y proyectos</h1>
                <p>Información territorial de iniciativas comunales visibles para la ciudadanía.</p>
            </div>
        </header>
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
        const fallbackPhoto = 'assets/images/logo.png';
        const map = L.map('publicProjectMap', {zoomControl: false}).setView([-20.2595, -69.7863], 13);
        const markers = new Map();
        const publicProjectList = document.getElementById('publicProjectList');
        const detailDrawer = document.getElementById('projectDetailDrawer');
        const detailTitle = document.getElementById('detailTitle');
        const detailBody = document.getElementById('detailBody');
        L.control.zoom({position: 'bottomright'}).addTo(map);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: '&copy; OpenStreetMap'}).addTo(map);
        document.getElementById('projectCounter').textContent = String(projects.length);
        document.getElementById('projectListCount').textContent = `${projects.length} proyectos`;
        document.getElementById('visibleMetric').textContent = String(projects.length);
        document.getElementById('activeMetric').textContent = String(projects.filter(project => project.estado === 'En ejecución').length);
        document.getElementById('emptyMessage').hidden = projects.length > 0;

        function escapeHtml(value) { return String(value ?? '').replace(/[&<>\"']/g, character => ({'&':'&amp;','<':'&lt;','>':'&gt;','\"':'&quot;',"'":'&#039;'}[character])); }
        function slug(value) { return (value || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/\s+/g, '-'); }
        function markerColor(status) { return {'En ejecución':'#4caf50','Finalizado':'#0f5fa8','Pausado':'#ef5350'}[status] || '#ffa52d'; }
        function icon(status) { const color = markerColor(status); return L.divIcon({className: '', html: `<span style="display:block;width:28px;height:28px;border-radius:50%;background:${color};border:5px solid #fff;box-shadow:0 8px 18px rgba(15,23,42,.18)"></span>`, iconSize: [28, 28], iconAnchor: [14, 14]}); }
        function getPhotos(project) { try { const parsed = JSON.parse(project.fotos || '[]'); if (Array.isArray(parsed)) { const clean = parsed.filter(photo => typeof photo === 'string' && photo.trim() !== ''); if (clean.length) return clean; } } catch (error) {} return project.foto && String(project.foto).trim() !== '' ? [project.foto] : [fallbackPhoto]; }
        function sliderHtml(project, imageHeight = 150) { const photos = getPhotos(project); const controls = photos.length > 1 ? `<button class="slider-btn prev" data-slider-dir="-1" type="button">‹</button><button class="slider-btn next" data-slider-dir="1" type="button">›</button><span class="slider-dots">${photos.map(() => '<i></i>').join('')}</span>` : ''; return `<span class="map-slider" data-slider-index="0" data-photos="${encodeURIComponent(JSON.stringify(photos))}"><img style="height:${imageHeight}px" src="${photos[0] || fallbackPhoto}" alt="">${controls}</span>`; }
        function popup(project) { return `${sliderHtml(project, 148)}<div class="popup-title">${escapeHtml(project.nombre)}</div><div class="popup-meta"><b>Estado:</b> ${escapeHtml(project.estado)}<br><b>Etapa:</b> ${escapeHtml(project.etapa)}<br><b>Sector:</b> ${escapeHtml(project.sector || '-')}<br><b>Avance:</b> ${Number(project.avance) || 0}%</div><div class="popup-actions"><button class="popup-detail-btn" type="button" data-detail-id="${project.id}">Ver más detalle</button></div>`; }
        function cardHtml(project) { return `<article class="public-project-card" role="button" tabindex="0" data-id="${project.id}">${sliderHtml(project, 128)}<div class="public-card-body"><span class="tag ${slug(project.estado)}">${escapeHtml(project.estado)}</span><strong class="public-card-title">${escapeHtml(project.nombre)}</strong><div class="public-card-meta"><b>Etapa:</b> ${escapeHtml(project.etapa)}<br><b>Sector:</b> ${escapeHtml(project.sector || '-')}<br><b>Monto:</b> ${escapeHtml(project.monto || '-')}</div><span class="progress"><span style="width:${Number(project.avance) || 0}%"></span></span></div></article>`; }
        function focus(project) { document.querySelectorAll('.public-project-card').forEach(card => card.classList.toggle('active', String(card.dataset.id) === String(project.id))); }
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

        publicProjectList.innerHTML = projects.length ? projects.map(cardHtml).join('') : '<div class="empty-message">No hay proyectos visibles para mostrar.</div>';
        const bounds = [];
        projects.forEach(project => {
            const latlng = [Number(project.lat), Number(project.lng)];
            bounds.push(latlng);
            const marker = L.marker(latlng, {icon: icon(project.estado)}).addTo(map).bindPopup(popup(project)).on('click', () => focus(project));
            markers.set(String(project.id), marker);
        });
        if (bounds.length) {
            map.fitBounds(bounds, {paddingTopLeft: [360, 80], paddingBottomRight: [90, 90], maxZoom: 15});
            focus(projects[0]);
        }

        publicProjectList.addEventListener('click', event => {
            const card = event.target.closest('.public-project-card');
            if (!card || event.target.closest('[data-slider-dir]')) return;
            const project = projects.find(item => String(item.id) === String(card.dataset.id));
            const marker = markers.get(String(card.dataset.id));
            if (!project || !marker) return;
            event.stopPropagation();
            focus(project);
            map.flyTo(marker.getLatLng(), 16, {duration: .8});
            marker.openPopup();
            openProjectDetail(project);
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
