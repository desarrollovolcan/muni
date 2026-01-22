<?php
require __DIR__ . '/app/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && verify_csrf($_POST['csrf_token'] ?? null)) {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

    if ($_POST['action'] === 'disable' && $id > 0) {
        $stmt = db()->prepare('UPDATE authorities SET estado = 0 WHERE id = ?');
        $stmt->execute([$id]);
    }

    redirect('autoridades-lista.php');
}

$autoridades = db()->query('SELECT id, nombre, tipo, fecha_inicio, fecha_fin, correo, estado FROM authorities ORDER BY fecha_inicio DESC')->fetchAll();
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Listar autoridades"; include('partials/title-meta.php'); ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <?php include('partials/menu.php'); ?>

        <!-- ============================================================== -->
        <!-- Start Main Content -->
        <!-- ============================================================== -->

        <div class="content-page">

            <div class="container-fluid">

                <?php $subtitle = "Autoridades"; $title = "Listar autoridades"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                                    <div class="d-flex flex-wrap gap-2">
                                        <select class="form-select">
                                            <option value="">Estado</option>
                                            <option>Vigente</option>
                                            <option>Histórico</option>
                                        </select>
                                        <select class="form-select">
                                            <option value="">Tipo</option>
                                            <option>Alcalde</option>
                                            <option>Concejal</option>
                                            <option>Administrador Municipal</option>
                                        </select>
                                    </div>
                                    <a href="autoridades-editar.php" class="btn btn-primary">Crear autoridad</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Autoridad</th>
                                                <th>Tipo</th>
                                                <th>Periodo</th>
                                                <th>Contacto</th>
                                                <th class="text-end">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($autoridades)) : ?>
                                                <tr>
                                                    <td colspan="5" class="text-center text-muted">No hay autoridades registradas.</td>
                                                </tr>
                                            <?php else : ?>
                                                <?php foreach ($autoridades as $autoridad) : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($autoridad['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($autoridad['tipo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($autoridad['fecha_inicio'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($autoridad['fecha_fin'] ?? 'Vigente', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($autoridad['correo'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td class="text-end">
                                                            <a href="autoridades-detalle.php?id=<?php echo (int) $autoridad['id']; ?>" class="btn btn-sm btn-outline-primary">Ver</a>
                                                            <a href="autoridades-editar.php?id=<?php echo (int) $autoridad['id']; ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                                                            <form method="post" class="d-inline">
                                                                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                                                <input type="hidden" name="action" value="disable">
                                                                <input type="hidden" name="id" value="<?php echo (int) $autoridad['id']; ?>">
                                                                <button type="submit" class="btn btn-sm btn-outline-danger" <?php echo (int) $autoridad['estado'] === 0 ? 'disabled' : ''; ?>>Deshabilitar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- container -->

            <?php include('partials/footer.php'); ?>

        </div>

        <!-- ============================================================== -->
        <!-- End of Main Content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <?php include('partials/customizer.php'); ?>

    <?php include('partials/footer-scripts.php'); ?>

</body>

</html>
