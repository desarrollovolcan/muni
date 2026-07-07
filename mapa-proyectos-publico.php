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
        :root{--primary:#0f5fa8;--primary-2:#1488d8;--accent:#00a98f;--ink:#13243a;--muted:#6f7f91;--line:#dbe6f2;--panel:rgba(255,255,255,.94);--shadow:0 24px 70px rgba(15,38,66,.22)}*{box-sizing:border-box}html,body,#publicProjectMap{height:100%;margin:0;width:100%}body{background:#e9f0f7;color:var(--ink);font-family:Inter,"Segoe UI",Arial,sans-serif;overflow:hidden}.screen-map{height:100vh;position:relative;width:100vw}#publicProjectMap{background:#dbe7f3}.map-vignette{background:linear-gradient(90deg,rgba(10,28,50,.14),transparent 28%,transparent 72%,rgba(10,28,50,.1));inset:0;pointer-events:none;position:absolute;z-index:410}.project-sidebar,.project-detail-drawer,.screen-legend,.civic-header{backdrop-filter:blur(18px);-webkit-backdrop-filter:blur(18px)}.civic-header{align-items:center;background:linear-gradient(135deg,rgba(255,255,255,.96),rgba(247,251,255,.88));border:1px solid rgba(220,231,243,.94);border-radius:0 0 24px 24px;box-shadow:0 18px 55px rgba(15,38,66,.14);display:flex;gap:16px;left:50%;max-width:min(760px,calc(100vw - 690px));min-width:390px;padding:14px 18px;position:absolute;top:0;transform:translateX(-50%);z-index:590}.civic-seal{align-items:center;background:linear-gradient(135deg,var(--primary),var(--primary-2));border-radius:16px;box-shadow:0 12px 28px rgba(15,95,168,.22);display:flex;height:48px;justify-content:center;min-width:48px;padding:7px}.civic-seal img{max-height:34px;max-width:92px;object-fit:contain}.civic-copy small{color:var(--primary);display:block;font-size:11px;font-weight:900;letter-spacing:.1em;text-transform:uppercase}.civic-copy h1{font-size:19px;line-height:1.15;margin:3px 0}.civic-copy p{color:var(--muted);font-size:12px;margin:0}.project-sidebar{background:var(--panel);border:1px solid rgba(214,224,238,.94);border-radius:0 26px 26px 0;box-shadow:var(--shadow);display:flex;flex-direction:column;height:calc(100vh - 28px);left:0;overflow:hidden;position:absolute;top:14px;width:335px;z-index:620}.sidebar-head{background:linear-gradient(180deg,#fff,#f7fbff);border-bottom:1px solid #e4edf7;padding:18px}.sidebar-brand{align-items:center;display:flex;gap:12px}.sidebar-brand img{height:38px;max-width:126px;object-fit:contain}.sidebar-brand h2{color:#1d3047;font-size:16px;line-height:1.12;margin:0}.sidebar-brand p{color:#74849a;font-size:11px;margin:4px 0 0}.screen-counter{background:linear-gradient(135deg,var(--primary),var(--primary-2));border-radius:999px;color:#fff;font-size:12px;font-weight:900;margin-left:auto;padding:7px 10px}.sidebar-summary{display:grid;gap:10px;grid-template-columns:1fr 1fr;margin-top:16px}.summary-tile{background:#f6faff;border:1px solid #e2ebf6;border-radius:16px;padding:11px}.summary-tile span{color:#7a8aa0;display:block;font-size:10px;font-weight:900;letter-spacing:.05em;text-transform:uppercase}.summary-tile strong{color:#20344d;display:block;font-size:18px;margin-top:3px}.project-list-title{align-items:center;color:#516177;display:flex;font-size:11px;font-weight:900;justify-content:space-between;margin-top:14px;text-transform:uppercase}.public-project-list{display:grid;gap:10px;overflow:auto;padding:12px}.public-project-card{background:linear-gradient(135deg,#fff,#f8fbff);border:1px solid #e1ebf6;border-radius:18px;box-shadow:0 12px 28px rgba(31,54,86,.08);cursor:pointer;display:grid;grid-template-columns:92px minmax(0,1fr);min-height:128px;overflow:hidden;text-align:left;transition:.2s ease;width:100%}.public-project-card:hover,.public-project-card.active{border-color:#91c5fb;box-shadow:0 18px 36px rgba(20,118,205,.18);transform:translateY(-2px)}.public-project-card .map-slider{height:100%}.public-project-card .map-slider img{border-radius:18px 0 0 18px;height:100%!important;margin:0;min-height:128px}.public-card-body{min-width:0;padding:11px 12px}.public-card-title{color:#1c2f46;display:block;font-size:13px;font-weight:900;line-height:1.18;margin:7px 0}.public-card-meta{color:#64758b;display:block;font-size:11px;line-height:1.38}.tag{border-radius:999px;display:inline-flex;font-size:10px;font-weight:900;padding:4px 9px}.tag.en-ejecucion{background:#e5fbf0;color:#138f51}.tag.finalizado{background:#e5f0ff;color:#0f5fa8}.tag.planificacion,.tag.licitacion{background:#fff3da;color:#b77100}.tag.pausado{background:#fff0ef;color:#c73631}.progress{background:#e8eef7;border-radius:999px;display:block;height:6px;margin-top:9px;overflow:hidden}.progress span{background:linear-gradient(90deg,var(--accent),var(--primary-2));display:block;height:100%}.screen-legend{background:rgba(255,255,255,.92);border:1px solid rgba(214,224,238,.9);border-radius:18px;bottom:24px;box-shadow:0 18px 45px rgba(31,54,86,.14);display:flex;gap:14px;left:360px;padding:12px 16px;position:absolute;z-index:520}.screen-legend span{align-items:center;color:#4f6076;display:flex;font-size:12px;font-weight:800;gap:7px}.dot{border-radius:50%;display:inline-block;height:10px;width:10px}.map-slider{display:block;position:relative}.map-slider img{background:#f3f6fa;border-radius:16px;height:128px;margin-bottom:0;object-fit:cover;width:100%}.slider-btn{background:rgba(19,36,58,.76);border:0;border-radius:50%;color:#fff;display:grid;font-size:16px;height:24px;place-items:center;position:absolute;top:50%;transform:translateY(-50%);width:24px;z-index:2}.slider-btn.prev{left:8px}.slider-btn.next{right:8px}.slider-dots{bottom:10px;display:flex;gap:5px;justify-content:center;left:0;position:absolute;right:0}.slider-dots i{background:rgba(255,255,255,.82);border-radius:50%;height:6px;width:6px}.leaflet-popup-content-wrapper{border-radius:18px;box-shadow:0 18px 45px rgba(15,38,66,.24)}.leaflet-popup-content{margin:14px;min-width:290px}.leaflet-container a.leaflet-popup-close-button{background:#eef5fb;border-radius:50%;color:#516177;height:26px;line-height:24px;right:8px;top:8px;width:26px}.popup-actions{margin-top:13px}.popup-detail-btn{align-items:center;background:linear-gradient(135deg,var(--primary),var(--primary-2));border:0;border-radius:999px;box-shadow:0 12px 24px rgba(15,95,168,.24);color:#fff;cursor:pointer;display:inline-flex;font-size:12px;font-weight:900;justify-content:center;padding:10px 14px;text-decoration:none;width:100%}.popup-detail-btn:hover{filter:brightness(.96)}.popup-title{color:#1d3047;font-size:15px;font-weight:900;line-height:1.2;margin:10px 0 7px}.popup-meta{color:#64758b;font-size:12px;line-height:1.55}.empty-message{background:rgba(255,255,255,.95);border:1px solid #dce6f2;border-radius:20px;box-shadow:0 18px 45px rgba(31,54,86,.12);left:calc(50% + 180px);padding:24px;position:absolute;text-align:center;top:50%;transform:translate(-50%,-50%);z-index:630}.project-detail-drawer{background:linear-gradient(180deg,rgba(255,255,255,.98),rgba(247,251,255,.96));border:1px solid rgba(214,224,238,.94);border-radius:26px 0 0 26px;box-shadow:var(--shadow);display:flex;flex-direction:column;height:calc(100vh - 28px);max-width:460px;opacity:0;overflow:hidden;position:absolute;right:0;top:14px;transform:translateX(108%);transition:transform .26s ease,opacity .26s ease;width:min(430px,calc(100vw - 24px));z-index:660}.project-detail-drawer.open{opacity:1;transform:translateX(0)}.detail-head{background:linear-gradient(135deg,#0f5fa8,#178bdc);color:#fff;padding:19px 20px 22px;position:relative}.detail-head-main{align-items:flex-start;display:flex;gap:12px;justify-content:space-between}.detail-kicker{display:block;font-size:11px;font-weight:900;letter-spacing:.1em;opacity:.84;text-transform:uppercase}.detail-head h2{font-size:20px;line-height:1.18;margin:6px 0 0}.detail-close{background:rgba(255,255,255,.18);border:1px solid rgba(255,255,255,.28);border-radius:50%;color:#fff;cursor:pointer;font-size:24px;height:36px;line-height:1;width:36px}.detail-body{overflow:auto;padding:16px 18px 22px}.detail-body .map-slider img{height:210px!important}.detail-status-row{align-items:center;display:flex;gap:10px;justify-content:space-between;margin:15px 0}.detail-status-row strong{color:#20344d;font-size:13px}.detail-progress{background:#e8eef7;border-radius:999px;height:10px;overflow:hidden}.detail-progress span{background:linear-gradient(90deg,var(--accent),var(--primary-2));display:block;height:100%}.detail-grid{display:grid;gap:10px;grid-template-columns:1fr 1fr;margin-top:15px}.detail-item{background:#fff;border:1px solid #e2ebf6;border-radius:15px;box-shadow:0 8px 20px rgba(31,54,86,.05);padding:11px 12px}.detail-item.wide{grid-column:1/-1}.detail-label{color:#7a899c;display:block;font-size:10px;font-weight:900;letter-spacing:.06em;text-transform:uppercase}.detail-value{color:#24384f;display:block;font-size:13px;font-weight:800;margin-top:4px}.detail-description{background:#fff;border:1px solid #e2ebf6;border-radius:16px;color:#4e5f74;font-size:13px;line-height:1.6;margin-top:14px;padding:14px;white-space:pre-line}.leaflet-control-zoom{border:0!important;box-shadow:0 14px 35px rgba(31,54,86,.18)!important}.leaflet-control-zoom a{border:0!important;color:#20344d!important}@media(max-width:1180px){.civic-header{display:none}}@media(max-width:900px){.project-sidebar{border-radius:0 0 22px 22px;height:44vh;top:0;width:100%}.public-project-list{grid-auto-flow:column;grid-auto-columns:260px;overflow-x:auto;overflow-y:hidden}.project-detail-drawer{border-radius:22px 22px 0 0;bottom:0;height:62vh;max-width:none;right:12px;top:auto;width:calc(100vw - 24px)}.detail-grid{grid-template-columns:1fr}.screen-legend{bottom:12px;left:12px;right:12px;flex-wrap:wrap}.empty-message{left:50%;top:65%}}@media print{.project-sidebar,.screen-legend,.project-detail-drawer,.civic-header{display:none}}
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
        function icon(status) { const color = markerColor(status); return L.divIcon({className: '', html: `<span style="display:block;width:28px;height:28px;border-radius:50%;background:${color};border:5px solid #fff;box-shadow:0 10px 24px #0005"></span>`, iconSize: [28, 28], iconAnchor: [14, 14]}); }
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
