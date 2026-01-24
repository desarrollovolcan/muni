<?php
require __DIR__ . '/app/bootstrap.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$autoridad = null;
$errors = [];
$errorMessage = '';
$bulkErrors = [];
$bulkSuccess = '';
$success = $_GET['success'] ?? '';

try {
    db()->exec(
        'CREATE TABLE IF NOT EXISTS authority_groups (
            id INT UNSIGNED NOT NULL AUTO_INCREMENT,
            nombre VARCHAR(120) NOT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            UNIQUE KEY authority_groups_nombre_unique (nombre)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
    );
} catch (Exception $e) {
} catch (Error $e) {
}

$groups = db()->query('SELECT id, nombre FROM authority_groups ORDER BY nombre')->fetchAll();

if ($id > 0) {
    $stmt = db()->prepare('SELECT * FROM authorities WHERE id = ?');
    $stmt->execute([$id]);
    $autoridad = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $deleteId = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    if ($deleteId > 0) {
        try {
            $stmt = db()->prepare('DELETE FROM authorities WHERE id = ?');
            $stmt->execute([$deleteId]);
            redirect('autoridades-editar.php');
        } catch (Exception $e) {
            $errorMessage = 'No se pudo eliminar la autoridad. Verifica dependencias asociadas.';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'bulk_upload' && verify_csrf($_POST['csrf_token'] ?? null)) {
    if (!isset($_FILES['autoridades_excel']) || $_FILES['autoridades_excel']['error'] !== UPLOAD_ERR_OK) {
        $bulkErrors[] = 'Selecciona un archivo Excel válido.';
    } else {
        $extension = strtolower(pathinfo($_FILES['autoridades_excel']['name'], PATHINFO_EXTENSION));
        if ($extension !== 'xlsx') {
            $bulkErrors[] = 'El archivo debe estar en formato Excel (.xlsx).';
        } else {
            $rows = parse_excel_sheet($_FILES['autoridades_excel']['tmp_name']);
            if (empty($rows)) {
                $bulkErrors[] = 'El archivo está vacío o no tiene una hoja válida.';
            } else {
                $expected = ['nombre', 'tipo', 'correo', 'telefono', 'fecha_inicio', 'fecha_fin', 'estado'];
                $header = array_map('trim', $rows[0]);
                $normalizedHeader = array_map('strtolower', $header);
                $columnMap = [];
                foreach ($normalizedHeader as $index => $column) {
                    if ($column !== '') {
                        $columnMap[$column] = $index;
                    }
                }
                $missing = array_diff($expected, array_keys($columnMap));
                if (!empty($missing)) {
                    $bulkErrors[] = 'Faltan columnas requeridas: ' . implode(', ', $missing) . '. Descarga la plantilla para usar el formato correcto.';
                } else {
                    $validRows = [];
                    for ($i = 1; $i < count($rows); $i++) {
                        $rowNumber = $i + 1;
                        $row = $rows[$i];
                        $nombre = trim((string) ($row[$columnMap['nombre']] ?? ''));
                        $tipo = trim((string) ($row[$columnMap['tipo']] ?? ''));
                        $correo = trim((string) ($row[$columnMap['correo']] ?? ''));
                        $telefono = trim((string) ($row[$columnMap['telefono']] ?? ''));
                        $fechaInicio = trim((string) ($row[$columnMap['fecha_inicio']] ?? ''));
                        $fechaFin = trim((string) ($row[$columnMap['fecha_fin']] ?? ''));
                        $estadoRaw = trim((string) ($row[$columnMap['estado']] ?? ''));

                        if ($nombre === '' && $tipo === '' && $fechaInicio === '' && $correo === '' && $telefono === '' && $fechaFin === '' && $estadoRaw === '') {
                            continue;
                        }
                        if ($nombre === '' || $tipo === '' || $fechaInicio === '') {
                            $bulkErrors[] = "Fila {$rowNumber}: faltan campos obligatorios (nombre, tipo o fecha_inicio).";
                            continue;
                        }
                        if ($fechaInicio !== '' && is_numeric($fechaInicio)) {
                            $fechaInicio = excel_serial_to_date($fechaInicio) ?? $fechaInicio;
                        }
                        $inicio = DateTime::createFromFormat('Y-m-d', $fechaInicio);
                        if (!$inicio || $inicio->format('Y-m-d') !== $fechaInicio) {
                            $bulkErrors[] = "Fila {$rowNumber}: fecha_inicio inválida (usa YYYY-MM-DD).";
                            continue;
                        }
                        if ($fechaFin !== '' && is_numeric($fechaFin)) {
                            $fechaFin = excel_serial_to_date($fechaFin) ?? $fechaFin;
                        }
                        $fechaFin = $fechaFin !== '' ? $fechaFin : null;
                        if ($fechaFin !== null) {
                            $fin = DateTime::createFromFormat('Y-m-d', $fechaFin);
                            if (!$fin || $fin->format('Y-m-d') !== $fechaFin) {
                                $bulkErrors[] = "Fila {$rowNumber}: fecha_fin inválida (usa YYYY-MM-DD).";
                                continue;
                            }
                        }
                        $estado = in_array(strtolower($estadoRaw), ['0', 'deshabilitado', 'inactivo'], true) ? 0 : 1;
                        $validRows[] = [
                            $nombre,
                            $tipo,
                            $correo !== '' ? $correo : null,
                            $telefono !== '' ? $telefono : null,
                            $fechaInicio,
                            $fechaFin,
                            $estado,
                        ];
                    }
                    if (!empty($bulkErrors)) {
                        $bulkErrors[] = 'Corrige los errores en el archivo antes de cargar.';
                    } elseif (!empty($validRows)) {
                        $stmtInsert = db()->prepare(
                            'INSERT INTO authorities (nombre, tipo, correo, telefono, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, ?, ?, ?)'
                        );
                        foreach ($validRows as $data) {
                            $stmtInsert->execute($data);
                        }
                        $bulkSuccess = "Se cargaron " . count($validRows) . " autoridades correctamente.";
                    } else {
                        $bulkErrors[] = 'No se encontraron filas válidas para importar.';
                    }
                }
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['action']) && verify_csrf($_POST['csrf_token'] ?? null)) {
    $nombre = trim($_POST['nombre'] ?? '');
    $tipo = trim($_POST['tipo'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $fechaInicio = $_POST['fecha_inicio'] ?? '';
    $fechaFin = $_POST['fecha_fin'] ?? null;
    $estado = isset($_POST['estado']) && $_POST['estado'] === '0' ? 0 : 1;
    $groupId = isset($_POST['group_id']) && $_POST['group_id'] !== '' ? (int) $_POST['group_id'] : null;

    if ($nombre === '' || $tipo === '' || $fechaInicio === '') {
        $errors[] = 'Completa los campos obligatorios.';
    }

    if (empty($errors)) {
        if ($id > 0) {
            $stmt = db()->prepare('UPDATE authorities SET nombre = ?, tipo = ?, correo = ?, telefono = ?, fecha_inicio = ?, fecha_fin = ?, estado = ?, group_id = ? WHERE id = ?');
            $stmt->execute([
                $nombre,
                $tipo,
                $correo !== '' ? $correo : null,
                $telefono !== '' ? $telefono : null,
                $fechaInicio,
                $fechaFin !== '' ? $fechaFin : null,
                $estado,
                $groupId,
                $id,
            ]);
            redirect('autoridades-editar.php?id=' . $id . '&success=1');
        } else {
            $stmt = db()->prepare('INSERT INTO authorities (nombre, tipo, correo, telefono, fecha_inicio, fecha_fin, estado, group_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([
                $nombre,
                $tipo,
                $correo !== '' ? $correo : null,
                $telefono !== '' ? $telefono : null,
                $fechaInicio,
                $fechaFin !== '' ? $fechaFin : null,
                $estado,
                $groupId,
            ]);
            $newId = (int) db()->lastInsertId();
            redirect('autoridades-editar.php?id=' . $newId . '&success=1');
        }
    }
}

$autoridades = db()->query('SELECT id, nombre, tipo, fecha_inicio, fecha_fin, correo, estado FROM authorities ORDER BY fecha_inicio DESC')->fetchAll();
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Crear/editar autoridad"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Autoridades"; $title = "Crear/editar autoridad"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if ($errorMessage !== '') : ?>
                                    <div class="alert alert-danger"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?></div>
                                <?php endif; ?>
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($errors as $error) : ?>
                                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($success === '1') : ?>
                                    <div class="alert alert-success">Autoridad guardada correctamente.</div>
                                <?php endif; ?>
                                <form method="post">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-nombre">Nombre completo</label>
                                            <input type="text" id="autoridad-nombre" name="nombre" class="form-control" value="<?php echo htmlspecialchars($autoridad['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-tipo">Tipo</label>
                                            <select id="autoridad-tipo" name="tipo" class="form-select">
                                                <?php $tipoActual = $autoridad['tipo'] ?? ''; ?>
                                                <option value="Alcalde" <?php echo $tipoActual === 'Alcalde' ? 'selected' : ''; ?>>Alcalde</option>
                                                <option value="Alcaldesa" <?php echo $tipoActual === 'Alcaldesa' ? 'selected' : ''; ?>>Alcaldesa</option>
                                                <option value="Concejal" <?php echo $tipoActual === 'Concejal' ? 'selected' : ''; ?>>Concejal</option>
                                                <option value="Administrador Municipal" <?php echo $tipoActual === 'Administrador Municipal' ? 'selected' : ''; ?>>Administrador Municipal</option>
                                                <option value="Secplan" <?php echo $tipoActual === 'Secplan' ? 'selected' : ''; ?>>Secplan</option>
                                                <option value="Dideco" <?php echo $tipoActual === 'Dideco' ? 'selected' : ''; ?>>Dideco</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-correo">Correo</label>
                                            <input type="email" id="autoridad-correo" name="correo" class="form-control" value="<?php echo htmlspecialchars($autoridad['correo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-telefono">Teléfono</label>
                                            <input type="tel" id="autoridad-telefono" name="telefono" class="form-control" value="<?php echo htmlspecialchars($autoridad['telefono'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-grupo">Grupo</label>
                                            <select id="autoridad-grupo" name="group_id" class="form-select">
                                                <option value="">Sin grupo</option>
                                                <?php $grupoActual = $autoridad['group_id'] ?? null; ?>
                                                <?php foreach ($groups as $group) : ?>
                                                    <option value="<?php echo (int) $group['id']; ?>" <?php echo (int) $grupoActual === (int) $group['id'] ? 'selected' : ''; ?>>
                                                        <?php echo htmlspecialchars($group['nombre'], ENT_QUOTES, 'UTF-8'); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-inicio">Fecha inicio</label>
                                            <input type="date" id="autoridad-inicio" name="fecha_inicio" class="form-control" value="<?php echo htmlspecialchars($autoridad['fecha_inicio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-fin">Fecha fin</label>
                                            <input type="date" id="autoridad-fin" name="fecha_fin" class="form-control" value="<?php echo htmlspecialchars($autoridad['fecha_fin'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-estado">Estado</label>
                                            <select id="autoridad-estado" name="estado" class="form-select">
                                                <option value="1" <?php echo !$autoridad || (int) ($autoridad['estado'] ?? 1) === 1 ? 'selected' : ''; ?>>Habilitado</option>
                                                <option value="0" <?php echo $autoridad && (int) $autoridad['estado'] === 0 ? 'selected' : ''; ?>>Deshabilitado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary">Guardar autoridad</button>
                                        <a href="autoridades-lista.php" class="btn btn-outline-secondary">Volver</a>
                                    </div>
                                </form>
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
