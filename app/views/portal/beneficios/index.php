<div class="card">
    <div class="card-body">
        <h4 class="card-title">Beneficios disponibles</h4>
        <div class="table-responsive">
            <table class="table">
                <thead><tr><th>Nombre</th><th>Estado</th><th></th></tr></thead>
                <tbody>
                <?php foreach ($beneficios as $b): ?>
                    <tr>
                        <td><?= $b['nombre'] ?? 'Beneficio' ?></td>
                        <td><?= $b['id_estado'] ?? '' ?></td>
                        <td><a href="/portal/beneficios/<?= $b['id'] ?>" class="btn btn-sm btn-primary">Ver</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
