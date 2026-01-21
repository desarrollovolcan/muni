<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Solicitudes</h5>
                <p class="text-muted mb-0"><?= count($solicitudes) ?> registradas</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Entregas</h5>
                <p class="text-muted mb-0"><?= count($entregas) ?> totales</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Beneficios publicados</h5>
                <p class="text-muted mb-0"><?= count($beneficios) ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5>Notificaciones pendientes</h5>
                <p class="text-muted mb-0"><?= count($notificaciones) ?></p>
            </div>
        </div>
    </div>
</div>
