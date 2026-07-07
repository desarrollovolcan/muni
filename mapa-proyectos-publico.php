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
        html,body,#publicProjectMap{height:100%;margin:0;width:100%}body{background:#eef3f8;color:#263548;font-family:Inter,Arial,sans-serif;overflow:hidden}.screen-map{height:100vh;position:relative;width:100vw}#publicProjectMap{background:#dbe6f2}.project-sidebar{background:rgba(255,255,255,.94);border:1px solid rgba(214,224,238,.9);border-radius:0 22px 22px 0;box-shadow:0 18px 55px rgba(31,54,86,.18);display:flex;flex-direction:column;height:calc(100vh - 28px);left:0;overflow:hidden;position:absolute;top:14px;width:310px;z-index:600}.sidebar-head{border-bottom:1px solid #e6edf7;padding:12px 14px}.sidebar-brand{align-items:center;display:flex;gap:12px}.sidebar-brand img{height:34px;max-width:120px;object-fit:contain}.sidebar-brand h1{color:#25364d;font-size:15px;line-height:1.1;margin:0}.sidebar-brand p{color:#74849a;font-size:10px;margin:3px 0 0}.screen-counter{background:#2d80ff;border-radius:999px;color:#fff;font-size:11px;font-weight:800;margin-left:auto;padding:5px 9px}.project-list-title{align-items:center;color:#516177;display:flex;font-size:11px;font-weight:800;justify-content:space-between;margin-top:10px}.public-project-list{display:grid;gap:8px;overflow:auto;padding:10px}.public-project-card{background:#fff;border:1px solid #e3ebf5;border-radius:12px;box-shadow:0 8px 20px rgba(31,54,86,.07);cursor:pointer;display:grid;grid-template-columns:82px minmax(0,1fr);height:116px;min-height:116px;overflow:hidden;text-align:left;transition:.18s ease;width:100%}.public-project-card:hover,.public-project-card.active{border-color:#9fc7ff;box-shadow:0 12px 26px rgba(45,128,255,.14);transform:translateY(-1px)}.public-project-card .map-slider{height:100%}.public-project-card .map-slider img{border-radius:12px 0 0 12px;height:100%!important;margin:0;min-height:116px}.public-card-body{padding:8px 10px;min-width:0}.public-card-title{display:block;color:#25364d;font-size:12px;font-weight:850;line-height:1.12;margin:4px 0 5px}.public-card-meta{display:block;color:#63758d;font-size:10px;line-height:1.28}.tag{border-radius:999px;display:inline-flex;font-size:9px;font-weight:850;padding:3px 7px}.tag.en-ejecucion{background:#e7fbef;color:#138f51}.tag.finalizado{background:#e7f1ff;color:#2d80ff}.tag.planificacion,.tag.licitacion{background:#fff3da;color:#d28400}.tag.pausado{background:#fff0ef;color:#d43f3a}.progress{display:block;background:#e8eef7;border-radius:999px;height:5px;margin-top:6px;overflow:hidden}.progress span{background:linear-gradient(90deg,#58d9c7,#2d80ff);display:block;height:100%}.screen-legend{background:rgba(255,255,255,.92);border:1px solid rgba(214,224,238,.88);border-radius:14px;bottom:24px;box-shadow:0 18px 45px rgba(31,54,86,.12);display:flex;gap:14px;left:332px;padding:11px 14px;position:absolute;z-index:500}.screen-legend span{align-items:center;color:#506176;display:flex;font-size:12px;font-weight:700;gap:6px}.dot{border-radius:50%;display:inline-block;height:9px;width:9px}.map-slider{display:block;position:relative}.map-slider img{background:#f3f6fa;border-radius:12px;height:116px;margin-bottom:0;object-fit:cover;width:100%}.slider-btn{background:rgba(31,54,86,.74);border:0;border-radius:50%;color:#fff;display:grid;font-size:16px;height:22px;place-items:center;position:absolute;top:50%;transform:translateY(-50%);width:22px;z-index:2}.slider-btn.prev{left:8px}.slider-btn.next{right:8px}.slider-dots{bottom:10px;display:flex;gap:5px;justify-content:center;left:0;position:absolute;right:0}.slider-dots i{background:rgba(255,255,255,.78);border-radius:50%;height:6px;width:6px}.leaflet-popup-content-wrapper{border-radius:16px}.leaflet-popup-content{min-width:280px}.popup-actions{margin-top:12px}.popup-detail-btn{align-items:center;background:#2d80ff;border:0;border-radius:999px;box-shadow:0 10px 22px rgba(45,128,255,.22);color:#fff;cursor:pointer;display:inline-flex;font-size:12px;font-weight:850;justify-content:center;padding:9px 14px;text-decoration:none;width:100%}.popup-detail-btn:hover{background:#176ee8}.popup-title{color:#27384f;font-size:15px;font-weight:850;line-height:1.2;margin-bottom:7px}.popup-meta{color:#63758d;font-size:12px;line-height:1.5}.empty-message{background:rgba(255,255,255,.95);border:1px solid #dce6f2;border-radius:18px;box-shadow:0 18px 45px rgba(31,54,86,.12);left:calc(50% + 180px);padding:22px;position:absolute;text-align:center;top:50%;transform:translate(-50%,-50%);z-index:600}.project-detail-drawer{background:rgba(255,255,255,.97);border:1px solid rgba(214,224,238,.9);border-radius:22px 0 0 22px;box-shadow:0 18px 55px rgba(31,54,86,.2);display:flex;flex-direction:column;height:calc(100vh - 28px);max-width:420px;opacity:0;overflow:hidden;position:absolute;right:0;top:14px;transform:translateX(105%);transition:transform .24s ease,opacity .24s ease;width:min(390px,calc(100vw - 24px));z-index:650}.project-detail-drawer.open{opacity:1;transform:translateX(0)}.detail-head{align-items:flex-start;border-bottom:1px solid #e6edf7;display:flex;gap:12px;justify-content:space-between;padding:16px 18px}.detail-kicker{color:#2d80ff;font-size:11px;font-weight:900;letter-spacing:.08em;text-transform:uppercase}.detail-head h2{color:#25364d;font-size:18px;line-height:1.18;margin:4px 0 0}.detail-close{background:#eef4fb;border:0;border-radius:50%;color:#516177;cursor:pointer;font-size:22px;height:34px;line-height:1;width:34px}.detail-body{overflow:auto;padding:16px 18px 20px}.detail-body .map-slider img{height:190px!important}.detail-status-row{align-items:center;display:flex;gap:10px;justify-content:space-between;margin:14px 0}.detail-progress{background:#e8eef7;border-radius:999px;height:9px;overflow:hidden}.detail-progress span{background:linear-gradient(90deg,#58d9c7,#2d80ff);display:block;height:100%}.detail-grid{display:grid;gap:10px;margin-top:14px}.detail-item{background:#f7faff;border:1px solid #e5edf7;border-radius:12px;padding:10px 12px}.detail-label{color:#7a899c;display:block;font-size:10px;font-weight:900;letter-spacing:.05em;text-transform:uppercase}.detail-value{color:#2c3d53;display:block;font-size:13px;font-weight:750;margin-top:3px}.detail-description{color:#516177;font-size:13px;line-height:1.55;margin-top:14px;white-space:pre-line}@media(max-width:900px){.project-sidebar{border-radius:0;height:44vh;top:0;width:100%;}.public-project-list{grid-auto-flow:column;grid-auto-columns:240px;overflow-x:auto;overflow-y:hidden}.project-detail-drawer{border-radius:18px 18px 0 0;bottom:0;height:58vh;max-width:none;right:12px;top:auto;width:calc(100vw - 24px)}.screen-legend{bottom:12px;left:12px;right:12px;flex-wrap:wrap}.empty-message{left:50%;top:65%}}@media print{.project-sidebar,.screen-legend{display:none}}
    </style>
</head>
<body>
    <main class="screen-map">
        <div id="publicProjectMap"></div>
        <aside class="project-sidebar">
            <div class="sidebar-head">
                <div class="sidebar-brand">
                    <img src="assets/images/logo.png" alt="Municipalidad">
                    <div>
                        <h1>Mapa de proyectos</h1>
                        <p>Selecciona un proyecto para ver su ubicación</p>
                    </div>
                    <strong class="screen-counter" id="projectCounter">0</strong>
                </div>
                <div class="project-list-title"><span>Proyectos visibles</span><span id="projectListCount">0</span></div>
            </div>
            <div class="public-project-list" id="publicProjectList"></div>
        </aside>
        <section class="screen-legend">
            <span><i class="dot" style="background:#4caf50"></i> En ejecución</span>
            <span><i class="dot" style="background:#2d80ff"></i> Finalizado</span>
            <span><i class="dot" style="background:#ffa52d"></i> Planificación / Licitación</span>
            <span><i class="dot" style="background:#ef5350"></i> Pausado</span>
        </section>
        <div class="empty-message" id="emptyMessage" hidden>No hay proyectos visibles para mostrar.</div>
        <aside class="project-detail-drawer" id="projectDetailDrawer" aria-hidden="true">
            <div class="detail-head">
                <div>
                    <span class="detail-kicker">Detalle del proyecto</span>
                    <h2 id="detailTitle">Selecciona un proyecto</h2>
                </div>
                <button class="detail-close" id="detailClose" type="button" aria-label="Cerrar detalle">×</button>
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
        document.getElementById('emptyMessage').hidden = projects.length > 0;

        function escapeHtml(value) { return String(value ?? '').replace(/[&<>\"']/g, character => ({'&':'&amp;','<':'&lt;','>':'&gt;','\"':'&quot;',"'":'&#039;'}[character])); }
        function slug(value) { return (value || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/\s+/g, '-'); }
        function markerColor(status) { return {'En ejecución':'#4caf50','Finalizado':'#2d80ff','Pausado':'#ef5350'}[status] || '#ffa52d'; }
        function icon(status) { const color = markerColor(status); return L.divIcon({className: '', html: `<span style="display:block;width:26px;height:26px;border-radius:50%;background:${color};border:4px solid #fff;box-shadow:0 8px 22px #0004"></span>`, iconSize: [26, 26], iconAnchor: [13, 13]}); }
        function getPhotos(project) { try { const parsed = JSON.parse(project.fotos || '[]'); if (Array.isArray(parsed)) { const clean = parsed.filter(photo => typeof photo === 'string' && photo.trim() !== ''); if (clean.length) return clean; } } catch (error) {} return project.foto && String(project.foto).trim() !== '' ? [project.foto] : [fallbackPhoto]; }
        function sliderHtml(project, imageHeight = 150) { const photos = getPhotos(project); const controls = photos.length > 1 ? `<button class="slider-btn prev" data-slider-dir="-1" type="button">‹</button><button class="slider-btn next" data-slider-dir="1" type="button">›</button><span class="slider-dots">${photos.map(() => '<i></i>').join('')}</span>` : ''; return `<span class="map-slider" data-slider-index="0" data-photos="${encodeURIComponent(JSON.stringify(photos))}"><img style="height:${imageHeight}px" src="${photos[0] || fallbackPhoto}" alt="">${controls}</span>`; }
        function popup(project) { return `${sliderHtml(project, 140)}<div class="popup-title">${escapeHtml(project.nombre)}</div><div class="popup-meta"><b>Estado:</b> ${escapeHtml(project.estado)}<br><b>Etapa:</b> ${escapeHtml(project.etapa)}<br><b>Sector:</b> ${escapeHtml(project.sector || '-')}<br><b>Avance:</b> ${Number(project.avance) || 0}%</div><div class="popup-actions"><button class="popup-detail-btn" type="button" data-detail-id="${project.id}">Ver más detalle</button></div>`; }
        function cardHtml(project) { return `<article class="public-project-card" role="button" tabindex="0" data-id="${project.id}">${sliderHtml(project, 116)}<div class="public-card-body"><span class="tag ${slug(project.estado)}">${project.estado}</span><strong class="public-card-title">${project.nombre}</strong><div class="public-card-meta"><b>Etapa:</b> ${project.etapa}<br><b>Sector:</b> ${project.sector || '-'}<br><b>Monto:</b> ${project.monto || '-'}<br><b>Financiamiento:</b> ${project.financiamiento || '-'}</div><span class="progress"><span style="width:${Number(project.avance) || 0}%"></span></span></div></article>`; }
        function focus(project) { document.querySelectorAll('.public-project-card').forEach(card => card.classList.toggle('active', String(card.dataset.id) === String(project.id))); }
        function detailItem(label, value) { return `<div class="detail-item"><span class="detail-label">${label}</span><span class="detail-value">${escapeHtml(value || '-')}</span></div>`; }
        function openProjectDetail(project) {
            if (!project) return;
            detailTitle.textContent = project.nombre || 'Proyecto';
            detailBody.innerHTML = `${sliderHtml(project, 190)}<div class="detail-status-row"><span class="tag ${slug(project.estado)}">${escapeHtml(project.estado)}</span><strong>${Number(project.avance) || 0}% de avance</strong></div><div class="detail-progress"><span style="width:${Number(project.avance) || 0}%"></span></div><div class="detail-grid">${detailItem('Etapa', project.etapa)}${detailItem('Sector', project.sector)}${detailItem('Monto', project.monto)}${detailItem('Financiamiento', project.financiamiento)}${detailItem('Inicio', project.inicio)}${detailItem('Entrega', project.entrega)}</div><div class="detail-description">${escapeHtml(project.descripcion || 'Sin descripción disponible.')}</div>`;
            detailDrawer.classList.add('open');
            detailDrawer.setAttribute('aria-hidden', 'false');
        }
        function closeProjectDetail() { detailDrawer.classList.remove('open'); detailDrawer.setAttribute('aria-hidden', 'true'); }

        publicProjectList.innerHTML = projects.length ? projects.map(cardHtml).join('') : '<div class="empty-message">No hay proyectos visibles para mostrar.</div>';
        const bounds = [];
        projects.forEach(project => {
            const latlng = [Number(project.lat), Number(project.lng)];
            bounds.push(latlng);
            const marker = L.marker(latlng, {icon: icon(project.estado)}).addTo(map).bindPopup(popup(project)).on('click', () => focus(project));
            markers.set(String(project.id), marker);
        });
        if (bounds.length) {
            map.fitBounds(bounds, {paddingTopLeft: [335, 60], paddingBottomRight: [60, 60], maxZoom: 15});
            focus(projects[0]);
        }

        publicProjectList.addEventListener('click', event => {
            const card = event.target.closest('.public-project-card');
            if (!card || event.target.closest('[data-slider-dir]')) return;
            const project = projects.find(item => String(item.id) === String(card.dataset.id));
            const marker = markers.get(String(card.dataset.id));
            if (!project || !marker) return;
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

        document.getElementById('detailClose').addEventListener('click', closeProjectDetail);

        document.addEventListener('click', event => {
            const detailButton = event.target.closest('[data-detail-id]');
            if (detailButton) {
                event.preventDefault();
                const project = projects.find(item => String(item.id) === String(detailButton.dataset.detailId));
                openProjectDetail(project);
                return;
            }
            const button = event.target.closest('[data-slider-dir]');
            if (!button) return;
            event.preventDefault();
            event.stopPropagation();
            const slider = button.closest('[data-photos]');
            advanceSlider(slider, Number(button.dataset.sliderDir));
        });
    </script>
</body>
</html>
