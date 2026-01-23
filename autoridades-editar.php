<?php
require __DIR__ . '/app/bootstrap.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$autoridad = null;
$errors = [];
$errorMessage = '';
$bulkErrors = [];
$bulkSuccess = '';
$success = $_GET['success'] ?? '';

function excel_serial_to_date($value): ?string
{
    if (!is_numeric($value)) {
        return null;
    }
    $serial = (int) $value;
    if ($serial <= 0) {
        return null;
    }
    $base = new DateTime('1899-12-30');
    $base->modify('+' . $serial . ' days');
    return $base->format('Y-m-d');
}

function parse_excel_sheet(string $path): array
{
    $rows = [];
    $zip = new ZipArchive();
    if ($zip->open($path) !== true) {
        return $rows;
    }

    $sharedStrings = [];
    $sharedXml = $zip->getFromName('xl/sharedStrings.xml');
    if ($sharedXml !== false) {
        $shared = simplexml_load_string($sharedXml);
        if ($shared) {
            foreach ($shared->si as $si) {
                if (isset($si->t)) {
                    $sharedStrings[] = (string) $si->t;
                } else {
                    $text = '';
                    foreach ($si->r as $run) {
                        $text .= (string) $run->t;
                    }
                    $sharedStrings[] = $text;
                }
            }
        }
    }

    $sheetXml = $zip->getFromName('xl/worksheets/sheet1.xml');
    if ($sheetXml === false) {
        $zip->close();
        return $rows;
    }

    $sheet = simplexml_load_string($sheetXml);
    if (!$sheet) {
        $zip->close();
        return $rows;
    }

    foreach ($sheet->sheetData->row as $row) {
        $rowData = [];
        foreach ($row->c as $cell) {
            $cellRef = (string) $cell['r'];
            $column = preg_replace('/\d+/', '', $cellRef);
            $columnIndex = ord($column) - ord('A');
            $value = '';
            if (isset($cell->v)) {
                $value = (string) $cell->v;
                $type = (string) $cell['t'];
                if ($type === 's') {
                    $value = $sharedStrings[(int) $value] ?? '';
                }
            } elseif (isset($cell->is->t)) {
                $value = (string) $cell->is->t;
            }
            $rowData[$columnIndex] = $value;
        }
        if (!empty($rowData)) {
            ksort($rowData);
            $rows[] = array_values($rowData);
        }
    }

    $zip->close();
    return $rows;
}

if (isset($_GET['action']) && $_GET['action'] === 'download-template') {
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="plantilla-autoridades.xlsx"');

    $tempFile = tempnam(sys_get_temp_dir(), 'xlsx');
    $zip = new ZipArchive();
    $zip->open($tempFile, ZipArchive::CREATE | ZipArchive::OVERWRITE);

    $sheetXml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">
  <sheetData>
    <row r="1">
      <c r="A1" t="inlineStr"><is><t>nombre</t></is></c>
      <c r="B1" t="inlineStr"><is><t>tipo</t></is></c>
      <c r="C1" t="inlineStr"><is><t>correo</t></is></c>
      <c r="D1" t="inlineStr"><is><t>telefono</t></is></c>
      <c r="E1" t="inlineStr"><is><t>fecha_inicio</t></is></c>
      <c r="F1" t="inlineStr"><is><t>fecha_fin</t></is></c>
      <c r="G1" t="inlineStr"><is><t>estado</t></is></c>
    </row>
    <row r="2">
      <c r="A2" t="inlineStr"><is><t>Juan Perez</t></is></c>
      <c r="B2" t="inlineStr"><is><t>Concejal</t></is></c>
      <c r="C2" t="inlineStr"><is><t>juan.perez@municipalidad.cl</t></is></c>
      <c r="D2" t="inlineStr"><is><t>+56 9 1234 5678</t></is></c>
      <c r="E2" t="inlineStr"><is><t>2024-01-01</t></is></c>
      <c r="F2" t="inlineStr"><is><t></t></is></c>
      <c r="G2" t="inlineStr"><is><t>1</t></is></c>
    </row>
  </sheetData>
</worksheet>
XML;

    $zip->addFromString('[Content_Types].xml', <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">
  <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>
  <Default Extension="xml" ContentType="application/xml"/>
  <Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/>
  <Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>
</Types>
XML);
    $zip->addFromString('_rels/.rels', <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
  <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/>
</Relationships>
XML);
    $zip->addFromString('xl/workbook.xml', <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">
  <sheets>
    <sheet name="Autoridades" sheetId="1" r:id="rId1"/>
  </sheets>
</workbook>
XML);
    $zip->addFromString('xl/_rels/workbook.xml.rels', <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
  <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/>
</Relationships>
XML);
    $zip->addFromString('xl/worksheets/sheet1.xml', $sheetXml);
    $zip->close();

    readfile($tempFile);
    unlink($tempFile);
    exit;
}

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

    if ($nombre === '' || $tipo === '' || $fechaInicio === '') {
        $errors[] = 'Completa los campos obligatorios.';
    }

    if (empty($errors)) {
        if ($id > 0) {
            $stmt = db()->prepare('UPDATE authorities SET nombre = ?, tipo = ?, correo = ?, telefono = ?, fecha_inicio = ?, fecha_fin = ?, estado = ? WHERE id = ?');
            $stmt->execute([
                $nombre,
                $tipo,
                $correo !== '' ? $correo : null,
                $telefono !== '' ? $telefono : null,
                $fechaInicio,
                $fechaFin !== '' ? $fechaFin : null,
                $estado,
                $id,
            ]);
            redirect('autoridades-editar.php?id=' . $id . '&success=1');
        } else {
            $stmt = db()->prepare('INSERT INTO authorities (nombre, tipo, correo, telefono, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([
                $nombre,
                $tipo,
                $correo !== '' ? $correo : null,
                $telefono !== '' ? $telefono : null,
                $fechaInicio,
                $fechaFin !== '' ? $fechaFin : null,
                $estado,
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Carga masiva de autoridades</h5>
                                    <p class="text-muted mb-0">Sube un archivo Excel con el formato indicado para crear autoridades en bloque.</p>
                                </div>
                                <a class="btn btn-sm btn-outline-primary" href="autoridades-editar.php?action=download-template">Descargar plantilla</a>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($bulkErrors)) : ?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($bulkErrors as $bulkError) : ?>
                                            <div><?php echo htmlspecialchars($bulkError, ENT_QUOTES, 'UTF-8'); ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($bulkSuccess !== '') : ?>
                                    <div class="alert alert-success"><?php echo htmlspecialchars($bulkSuccess, ENT_QUOTES, 'UTF-8'); ?></div>
                                <?php endif; ?>
                                <form method="post" enctype="multipart/form-data" class="row gy-2 align-items-end">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="action" value="bulk_upload">
                                    <div class="col-md-8">
                                        <label class="form-label" for="autoridades-excel">Archivo Excel (.xlsx)</label>
                                        <input type="file" id="autoridades-excel" name="autoridades_excel" class="form-control" accept=".xlsx">
                                        <div class="form-text">Columnas requeridas: nombre, tipo, correo, telefono, fecha_inicio, fecha_fin, estado.</div>
                                    </div>
                                    <div class="col-md-4 d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">Subir masivamente</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Listado de autoridades</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Autoridad</th>
                                                <th>Tipo</th>
                                                <th>Periodo</th>
                                                <th>Contacto</th>
                                                <th>Estado</th>
                                                <th class="text-end">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($autoridades)) : ?>
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted">No hay autoridades registradas.</td>
                                                </tr>
                                            <?php else : ?>
                                                <?php foreach ($autoridades as $autoridadItem) : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($autoridadItem['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($autoridadItem['tipo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($autoridadItem['fecha_inicio'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($autoridadItem['fecha_fin'] ?? 'Vigente', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($autoridadItem['correo'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td>
                                                            <?php if ((int) $autoridadItem['estado'] === 1) : ?>
                                                                <span class="badge text-bg-success">Habilitado</span>
                                                            <?php else : ?>
                                                                <span class="badge text-bg-secondary">Deshabilitado</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm btn-soft-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Acciones
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="autoridades-detalle.php?id=<?php echo (int) $autoridadItem['id']; ?>">Ver</a></li>
                                                                    <li><a class="dropdown-item" href="autoridades-editar.php?id=<?php echo (int) $autoridadItem['id']; ?>">Editar</a></li>
                                                                    <li><hr class="dropdown-divider"></li>
                                                                    <li>
                                                                        <form method="post" class="px-3 py-1" data-confirm="¿Estás seguro de eliminar esta autoridad?">
                                                                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                                                            <input type="hidden" name="action" value="delete">
                                                                            <input type="hidden" name="id" value="<?php echo (int) $autoridadItem['id']; ?>">
                                                                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">Eliminar</button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
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
