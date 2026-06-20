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
$projects = db()->query('SELECT id, nombre, estado, etapa, sector, monto, financiamiento, entrega, foto, fotos, descripcion, avance, lat, lng FROM map_projects WHERE visible = 1 ORDER BY nombre')->fetchAll();
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
        html,body,#publicProjectMap{height:100%;margin:0;width:100%}body{background:#eef3f8;color:#263548;font-family:Inter,Arial,sans-serif;overflow:hidden}.screen-map{height:100vh;position:relative;width:100vw}#publicProjectMap{background:#dbe6f2}.screen-brand{align-items:center;background:rgba(255,255,255,.92);border:1px solid rgba(214,224,238,.88);border-radius:18px;box-shadow:0 18px 45px rgba(31,54,86,.12);display:flex;gap:14px;left:24px;padding:14px 18px;position:absolute;top:24px;z-index:500}.screen-brand img{height:46px;max-width:180px;object-fit:contain}.screen-brand h1{color:#28384f;font-size:18px;line-height:1.1;margin:0}.screen-brand p{color:#74849a;font-size:12px;margin:4px 0 0}.screen-counter{background:#2d80ff;border-radius:999px;color:#fff;font-size:12px;font-weight:800;padding:6px 10px}.screen-legend{background:rgba(255,255,255,.92);border:1px solid rgba(214,224,238,.88);border-radius:14px;bottom:24px;box-shadow:0 18px 45px rgba(31,54,86,.12);display:flex;gap:14px;left:24px;padding:11px 14px;position:absolute;z-index:500}.screen-legend span{align-items:center;color:#506176;display:flex;font-size:12px;font-weight:700;gap:6px}.dot{border-radius:50%;display:inline-block;height:9px;width:9px}.focus-card{background:rgba(255,255,255,.94);border:1px solid rgba(214,224,238,.88);border-radius:18px;bottom:24px;box-shadow:0 18px 45px rgba(31,54,86,.12);max-width:360px;overflow:hidden;position:absolute;right:24px;width:32vw;z-index:500}.focus-card img{background:#f3f6fa;height:165px;object-fit:cover;width:100%}.focus-content{padding:14px}.focus-title{color:#24344a;font-size:16px;font-weight:850;line-height:1.2;margin-bottom:8px}.focus-meta{color:#66768c;font-size:12px;line-height:1.55}.tag{border-radius:999px;display:inline-flex;font-size:10px;font-weight:850;margin-bottom:8px;padding:5px 9px}.tag.en-ejecucion{background:#e7fbef;color:#138f51}.tag.finalizado{background:#e7f1ff;color:#2d80ff}.tag.planificacion,.tag.licitacion{background:#fff3da;color:#d28400}.tag.pausado{background:#fff0ef;color:#d43f3a}.progress{background:#e8eef7;border-radius:999px;height:8px;margin-top:10px;overflow:hidden}.progress span{background:linear-gradient(90deg,#58d9c7,#2d80ff);display:block;height:100%}.map-slider{position:relative}.map-slider img{background:#f3f6fa;border-radius:12px;height:150px;margin-bottom:10px;object-fit:cover;width:100%}.slider-btn{background:rgba(31,54,86,.74);border:0;border-radius:50%;color:#fff;display:grid;font-size:16px;height:28px;place-items:center;position:absolute;top:50%;transform:translateY(-50%);width:28px}.slider-btn.prev{left:8px}.slider-btn.next{right:8px}.slider-dots{bottom:16px;display:flex;gap:5px;justify-content:center;left:0;position:absolute;right:0}.slider-dots i{background:rgba(255,255,255,.78);border-radius:50%;height:6px;width:6px}.leaflet-popup-content-wrapper{border-radius:16px}.leaflet-popup-content{min-width:280px}.popup-title{color:#27384f;font-size:15px;font-weight:850;line-height:1.2;margin-bottom:7px}.popup-meta{color:#63758d;font-size:12px;line-height:1.5}.empty-message{background:rgba(255,255,255,.95);border:1px solid #dce6f2;border-radius:18px;box-shadow:0 18px 45px rgba(31,54,86,.12);left:50%;padding:22px;position:absolute;text-align:center;top:50%;transform:translate(-50%,-50%);z-index:600}@media(max-width:900px){.screen-brand{left:12px;right:12px;top:12px}.screen-legend{bottom:12px;left:12px;right:12px;flex-wrap:wrap}.focus-card{display:none}}@media print{.screen-brand,.screen-legend,.focus-card{display:none}}
    </style>
</head>
<body>
    <main class="screen-map">
        <div id="publicProjectMap"></div>
        <section class="screen-brand">
            <img src="assets/images/logo.png" alt="Municipalidad">
            <div>
                <h1>Mapa de proyectos</h1>
                <p>Visualización territorial para pantalla pública</p>
            </div>
            <strong class="screen-counter" id="projectCounter">0</strong>
        </section>
        <section class="screen-legend">
            <span><i class="dot" style="background:#4caf50"></i> En ejecución</span>
            <span><i class="dot" style="background:#2d80ff"></i> Finalizado</span>
            <span><i class="dot" style="background:#ffa52d"></i> Planificación / Licitación</span>
            <span><i class="dot" style="background:#ef5350"></i> Pausado</span>
        </section>
        <aside class="focus-card" id="focusCard" hidden></aside>
        <div class="empty-message" id="emptyMessage" hidden>No hay proyectos visibles para mostrar.</div>
    </main>
    <script src="assets/plugins/leaflet/leaflet.js"></script>
    <script>
        const projects = <?php echo $projectsJson ?: '[]'; ?>;
        const fallbackPhoto = 'assets/images/logo.png';
        const map = L.map('publicProjectMap', {zoomControl: false}).setView([-20.2595, -69.7863], 13);
        L.control.zoom({position: 'bottomright'}).addTo(map);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: '&copy; OpenStreetMap'}).addTo(map);
        document.getElementById('projectCounter').textContent = String(projects.length);
        document.getElementById('emptyMessage').hidden = projects.length > 0;

        function slug(value) { return (value || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/\s+/g, '-'); }
        function markerColor(status) { return {'En ejecución':'#4caf50','Finalizado':'#2d80ff','Pausado':'#ef5350'}[status] || '#ffa52d'; }
        function icon(status) { const color = markerColor(status); return L.divIcon({className: '', html: `<span style="display:block;width:26px;height:26px;border-radius:50%;background:${color};border:4px solid #fff;box-shadow:0 8px 22px #0004"></span>`, iconSize: [26, 26], iconAnchor: [13, 13]}); }
        function getPhotos(project) { try { const parsed = JSON.parse(project.fotos || '[]'); if (Array.isArray(parsed) && parsed.length) return parsed; } catch (error) {} return project.foto ? [project.foto] : [fallbackPhoto]; }
        function sliderHtml(project, imageHeight = 150) { const photos = getPhotos(project); const controls = photos.length > 1 ? `<button class="slider-btn prev" data-slider-dir="-1" type="button">‹</button><button class="slider-btn next" data-slider-dir="1" type="button">›</button><span class="slider-dots">${photos.map(() => '<i></i>').join('')}</span>` : ''; return `<span class="map-slider" data-slider-index="0" data-photos="${encodeURIComponent(JSON.stringify(photos))}"><img style="height:${imageHeight}px" src="${photos[0] || fallbackPhoto}" alt="">${controls}</span>`; }
        function popup(project) { return `${sliderHtml(project, 140)}<div class="popup-title">${project.nombre}</div><div class="popup-meta"><b>Estado:</b> ${project.estado}<br><b>Etapa:</b> ${project.etapa}<br><b>Sector:</b> ${project.sector || '-'}<br><b>Avance:</b> ${project.avance || 0}%</div>`; }
        function focus(project) { const card = document.getElementById('focusCard'); card.hidden = false; card.innerHTML = `${sliderHtml(project, 165)}<div class="focus-content"><span class="tag ${slug(project.estado)}">${project.estado}</span><div class="focus-title">${project.nombre}</div><div class="focus-meta"><b>Etapa:</b> ${project.etapa}<br><b>Sector:</b> ${project.sector || '-'}<br><b>Monto:</b> ${project.monto || '-'}<br><b>Financiamiento:</b> ${project.financiamiento || '-'}</div><div class="progress"><span style="width:${Number(project.avance) || 0}%"></span></div></div>`; }

        const bounds = [];
        projects.forEach(project => {
            const latlng = [Number(project.lat), Number(project.lng)];
            bounds.push(latlng);
            L.marker(latlng, {icon: icon(project.estado)}).addTo(map).bindPopup(popup(project)).on('click', () => focus(project));
        });
        if (bounds.length) {
            map.fitBounds(bounds, {padding: [60, 60], maxZoom: 15});
            focus(projects[0]);
        }

        document.addEventListener('click', event => {
            const button = event.target.closest('[data-slider-dir]');
            if (!button) return;
            event.preventDefault();
            event.stopPropagation();
            const slider = button.closest('[data-photos]');
            const photos = JSON.parse(decodeURIComponent(slider.dataset.photos || '%5B%5D'));
            if (!photos.length) return;
            let index = Number(slider.dataset.sliderIndex || 0);
            index = (index + Number(button.dataset.sliderDir) + photos.length) % photos.length;
            slider.dataset.sliderIndex = String(index);
            slider.querySelector('img').src = photos[index];
        });
    </script>
</body>
</html>
