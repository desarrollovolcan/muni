<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$success = $_GET['success'] ?? '';

$settings = db()->query('SELECT * FROM notification_settings LIMIT 1')->fetch();
if (!$settings) {
    $settings = [
        'canal_email' => 1,
        'canal_sms' => 0,
        'canal_app' => 1,
        'frecuencia' => 'diario',
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $action = $_POST['action'] ?? '';

    if ($action === 'save_settings') {
        $canalEmail = isset($_POST['canal_email']) ? 1 : 0;
        $canalSms = isset($_POST['canal_sms']) ? 1 : 0;
        $canalApp = isset($_POST['canal_app']) ? 1 : 0;
        $frecuencia = trim($_POST['frecuencia'] ?? 'diario');

        $frecuencias = ['tiempo_real', 'diario', 'semanal'];
        if (!in_array($frecuencia, $frecuencias, true)) {
            $frecuencia = 'diario';
        }

        $stmt = db()->query('SELECT id FROM notification_settings LIMIT 1');
        $id = $stmt->fetchColumn();

        if ($id) {
            $stmt = db()->prepare('UPDATE notification_settings SET canal_email = ?, canal_sms = ?, canal_app = ?, frecuencia = ? WHERE id = ?');
            $stmt->execute([$canalEmail, $canalSms, $canalApp, $frecuencia, $id]);
        } else {
            $stmt = db()->prepare('INSERT INTO notification_settings (canal_email, canal_sms, canal_app, frecuencia) VALUES (?, ?, ?, ?)');
            $stmt->execute([$canalEmail, $canalSms, $canalApp, $frecuencia]);
        }

        redirect('notificaciones-automaticas.php?success=settings');
    }

    if ($action === 'add_rule') {
        $evento = trim($_POST['evento'] ?? '');
        $destino = trim($_POST['destino'] ?? '');
        $canal = trim($_POST['canal'] ?? '');

        if ($evento === '' || $destino === '' || $canal === '') {
            $errors[] = 'Completa los campos requeridos para la regla.';
        }

        if (empty($errors)) {
            $stmt = db()->prepare('INSERT INTO notification_rules (evento, destino, canal, estado) VALUES (?, ?, ?, ?)');
            $stmt->execute([$evento, $destino, $canal, 'activa']);
            redirect('notificaciones-automaticas.php?success=rule');
        }
    }

    if ($action === 'toggle_rule') {
        $ruleId = (int) ($_POST['rule_id'] ?? 0);
        $estado = trim($_POST['estado'] ?? '');
        if ($ruleId > 0 && in_array($estado, ['activa', 'pausada'], true)) {
            $stmt = db()->prepare('UPDATE notification_rules SET estado = ? WHERE id = ?');
            $stmt->execute([$estado, $ruleId]);
            redirect('notificaciones-automaticas.php?success=rule');
        }
    }
}

$rules = db()->query('SELECT * FROM notification_rules ORDER BY created_at DESC')->fetchAll();
$destinos = array_unique(array_filter(array_column($rules, 'destino')));
$eventos = [
    'Documento próximo a vencer',
    'Evento en revisión',
    'Nuevo adjunto cargado',
    'Aprobación pendiente',
    'Documento vencido',
];
$canales = ['Email', 'SMS', 'Interna', 'Email + Interna'];
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Notificaciones automáticas"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Mantenedores"; $title = "Notificaciones automáticas"; include('partials/page-title.php'); ?>

                <?php if ($success === 'settings') : ?>
                    <div class="alert alert-success">Configuración actualizada correctamente.</div>
                <?php elseif ($success === 'rule') : ?>
                    <div class="alert alert-success">Regla actualizada correctamente.</div>
                <?php endif; ?>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Canales habilitados</h5>
                            </div>
                            <div class="card-body">
                                <form method="post" class="mb-3">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="action" value="save_settings">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="canal-email" name="canal_email" <?php echo !empty($settings['canal_email']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="canal-email">Correo electrónico</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="canal-sms" name="canal_sms" <?php echo !empty($settings['canal_sms']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="canal-sms">SMS</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="canal-app" name="canal_app" <?php echo !empty($settings['canal_app']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="canal-app">Notificación interna</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="frecuencia">Enviar recordatorios</label>
                                        <select id="frecuencia" name="frecuencia" class="form-select">
                                            <option value="tiempo_real" <?php echo $settings['frecuencia'] === 'tiempo_real' ? 'selected' : ''; ?>>En tiempo real</option>
                                            <option value="diario" <?php echo $settings['frecuencia'] === 'diario' ? 'selected' : ''; ?>>Diario</option>
                                            <option value="semanal" <?php echo $settings['frecuencia'] === 'semanal' ? 'selected' : ''; ?>>Semanal</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary w-100">Guardar cambios</button>
                                </form>
                                <div class="text-muted">Se aplica a todas las reglas activas.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Reglas configuradas</h5>
                                    <p class="text-muted mb-0">Define quién recibe avisos por eventos, documentos y permisos.</p>
                                </div>
                                <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#form-regla">Nueva regla</button>
                            </div>
                            <div class="card-body">
                                <div class="collapse show" id="form-regla">
                                    <form method="post" class="row g-3 mb-4">
                                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                        <input type="hidden" name="action" value="add_rule">
                                        <div class="col-md-4">
                                            <label class="form-label" for="evento">Evento</label>
                                            <select id="evento" name="evento" class="form-select" required>
                                                <option value="">Selecciona</option>
                                                <?php foreach ($eventos as $evento) : ?>
                                                    <option value="<?php echo htmlspecialchars($evento, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($evento, ENT_QUOTES, 'UTF-8'); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="destino">Destino</label>
                                            <input type="text" id="destino" name="destino" class="form-control" list="destinos" placeholder="Ej: Unidad responsable" required>
                                            <datalist id="destinos">
                                                <?php foreach ($destinos as $destino) : ?>
                                                    <option value="<?php echo htmlspecialchars($destino, ENT_QUOTES, 'UTF-8'); ?>"></option>
                                                <?php endforeach; ?>
                                            </datalist>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="canal">Canal</label>
                                            <select id="canal" name="canal" class="form-select" required>
                                                <option value="">Selecciona</option>
                                                <?php foreach ($canales as $canal) : ?>
                                                    <option value="<?php echo htmlspecialchars($canal, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($canal, ENT_QUOTES, 'UTF-8'); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-1 d-flex align-items-end">
                                            <button class="btn btn-primary w-100">Crear</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Evento</th>
                                                <th>Destino</th>
                                                <th>Canal</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($rules)) : ?>
                                                <tr>
                                                    <td colspan="5" class="text-muted text-center">No hay reglas configuradas.</td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php foreach ($rules as $rule) : ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($rule['evento'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td><?php echo htmlspecialchars($rule['destino'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td><?php echo htmlspecialchars($rule['canal'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td>
                                                        <?php $estado = $rule['estado'] === 'pausada' ? 'secondary' : 'success'; ?>
                                                        <span class="badge text-bg-<?php echo $estado; ?>">
                                                            <?php echo htmlspecialchars(ucfirst($rule['estado']), ENT_QUOTES, 'UTF-8'); ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <form method="post" class="d-inline">
                                                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                                            <input type="hidden" name="action" value="toggle_rule">
                                                            <input type="hidden" name="rule_id" value="<?php echo (int) $rule['id']; ?>">
                                                            <input type="hidden" name="estado" value="<?php echo $rule['estado'] === 'pausada' ? 'activa' : 'pausada'; ?>">
                                                            <button class="btn btn-sm btn-outline-secondary">
                                                                <?php echo $rule['estado'] === 'pausada' ? 'Reactivar' : 'Pausar'; ?>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
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
