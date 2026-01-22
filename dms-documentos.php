<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$success = $_GET['success'] ?? '';

$categorias = db()->query('SELECT id, nombre FROM document_categories ORDER BY nombre')->fetchAll();
$unidades = db()->query('SELECT id, nombre FROM unidades ORDER BY nombre')->fetchAll();
$etiquetas = db()->query('SELECT id, nombre FROM document_tags ORDER BY nombre')->fetchAll();
$usuarios = db()->query('SELECT id, nombre, apellido, correo FROM users WHERE estado = 1 ORDER BY nombre, apellido')->fetchAll();
$usuarioId = $_SESSION['user']['id'] ?? 1;

function format_file_size(int $bytes): string
{
    if ($bytes <= 0) {
        return '—';
    }
    $units = ['B', 'KB', 'MB', 'GB'];
    $power = min((int) floor(log($bytes, 1024)), count($units) - 1);
    $value = $bytes / (1024 ** $power);
    return number_format($value, $power === 0 ? 0 : 1) . ' ' . $units[$power];
}

function format_file_type(?string $mime, ?string $ruta): string
{
    if ($ruta) {
        $ext = pathinfo($ruta, PATHINFO_EXTENSION);
        if ($ext) {
            return strtoupper($ext);
        }
    }
    if ($mime) {
        $parts = explode('/', $mime);
        return strtoupper($parts[count($parts) - 1] ?? $mime);
    }
    return '—';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $action = $_POST['action'] ?? 'create_document';

    if ($action === 'create_document') {
        $titulo = trim($_POST['titulo'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $categoriaId = (int) ($_POST['categoria_id'] ?? 0);
        $unidadId = (int) ($_POST['unidad_id'] ?? 0);
        $estado = trim($_POST['estado'] ?? 'vigente');
        $version = trim($_POST['version'] ?? '');
        $vencimiento = trim($_POST['vencimiento'] ?? '');
        $tagsSeleccionados = $_POST['tags'] ?? [];

        if ($titulo === '') {
            $errors[] = 'El título del documento es obligatorio.';
        }
        if ($version === '') {
            $errors[] = 'La versión inicial es obligatoria.';
        }

        $archivoRuta = '';
        $archivoTipo = '';
        if (!empty($_FILES['archivo']) && is_array($_FILES['archivo']) && ($_FILES['archivo']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
            if ($_FILES['archivo']['error'] !== UPLOAD_ERR_OK) {
                $errors[] = 'No se pudo subir el archivo.';
            } else {
                $uploadDir = __DIR__ . '/uploads/documentos';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0775, true);
                }
                $filename = basename($_FILES['archivo']['name']);
                $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '_', $filename);
                $targetPath = $uploadDir . '/' . uniqid('doc_', true) . '_' . $safeName;
                if (!move_uploaded_file($_FILES['archivo']['tmp_name'], $targetPath)) {
                    $errors[] = 'No se pudo guardar el archivo en el servidor.';
                } else {
                    $archivoRuta = 'uploads/documentos/' . basename($targetPath);
                    $finfo = new finfo(FILEINFO_MIME_TYPE);
                    $archivoTipo = $finfo->file($targetPath) ?: 'application/octet-stream';
                }
            }
        } else {
            $errors[] = 'Debes adjuntar un archivo.';
        }

        $estadoPermitido = ['vigente', 'revision', 'vencido'];
        if (!in_array($estado, $estadoPermitido, true)) {
            $estado = 'vigente';
        }

        if (empty($errors)) {
            $stmt = db()->prepare('INSERT INTO documents (titulo, descripcion, categoria_id, unidad_id, estado, created_by) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([
                $titulo,
                $descripcion !== '' ? $descripcion : null,
                $categoriaId > 0 ? $categoriaId : null,
                $unidadId > 0 ? $unidadId : null,
                $estado,
                $usuarioId,
            ]);
            $documentId = (int) db()->lastInsertId();

            $stmt = db()->prepare('INSERT INTO document_versions (document_id, version, archivo_ruta, archivo_tipo, vencimiento, created_by) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([
                $documentId,
                $version,
                $archivoRuta,
                $archivoTipo,
                $vencimiento !== '' ? $vencimiento : null,
                $usuarioId,
            ]);

            if (is_array($tagsSeleccionados)) {
                $stmt = db()->prepare('INSERT INTO document_tag_links (document_id, tag_id) VALUES (?, ?)');
                foreach ($tagsSeleccionados as $tagId) {
                    $tagId = (int) $tagId;
                    if ($tagId > 0) {
                        $stmt->execute([$documentId, $tagId]);
                    }
                }
            }

            redirect('dms-documentos.php?success=1');
        }
    }

    if ($action === 'share_document') {
        $documentId = (int) ($_POST['document_id'] ?? 0);
        $sharedUsers = array_map('intval', $_POST['share_users'] ?? []);

        if ($documentId > 0) {
            $stmt = db()->prepare('DELETE FROM document_shares WHERE document_id = ?');
            $stmt->execute([$documentId]);

            if (!empty($sharedUsers)) {
                $stmtInsert = db()->prepare('INSERT INTO document_shares (document_id, user_id) VALUES (?, ?)');
                foreach ($sharedUsers as $userId) {
                    if ($userId > 0) {
                        $stmtInsert->execute([$documentId, $userId]);
                    }
                }
            }

            redirect('dms-documentos.php?success=share');
        }
    }

    if ($action === 'delete_document') {
        $documentId = (int) ($_POST['document_id'] ?? 0);
        if ($documentId > 0) {
            $stmt = db()->prepare('SELECT archivo_ruta FROM document_versions WHERE document_id = ?');
            $stmt->execute([$documentId]);
            $files = $stmt->fetchAll(PDO::FETCH_COLUMN);
            foreach ($files as $filePath) {
                $fullPath = __DIR__ . '/' . ltrim($filePath, '/');
                if (is_file($fullPath)) {
                    unlink($fullPath);
                }
            }

            $stmt = db()->prepare('DELETE FROM documents WHERE id = ?');
            $stmt->execute([$documentId]);
            redirect('dms-documentos.php?success=deleted');
        }
    }
}

$documentos = db()->query(
    'SELECT d.id, d.titulo, d.estado, c.nombre AS categoria, u.nombre AS unidad,
            v.version, v.vencimiento, v.archivo_ruta, v.archivo_tipo, v.created_at AS version_creada, COUNT(ds.user_id) AS shared_total
     FROM documents d
     LEFT JOIN document_categories c ON c.id = d.categoria_id
     LEFT JOIN unidades u ON u.id = d.unidad_id
     LEFT JOIN document_versions v ON v.id = (
        SELECT dv.id FROM document_versions dv
        WHERE dv.document_id = d.id
        ORDER BY dv.created_at DESC
        LIMIT 1
     )
     LEFT JOIN document_shares ds ON ds.document_id = d.id
     GROUP BY d.id
     ORDER BY d.created_at DESC'
)->fetchAll();

$documentShareMap = [];
$stmt = db()->query('SELECT document_id, user_id FROM document_shares');
foreach ($stmt->fetchAll() as $share) {
    $documentShareMap[(int) $share['document_id']][] = (int) $share['user_id'];
}

$categoryCounts = [];
$stmt = db()->query(
    'SELECT c.id, c.nombre, COUNT(d.id) AS total
     FROM document_categories c
     LEFT JOIN documents d ON d.categoria_id = c.id
     GROUP BY c.id
     ORDER BY c.nombre'
);
$categoryCounts = $stmt->fetchAll();

$totalDocumentos = count($documentos);
$sharedWithMe = 0;
$stmt = db()->prepare('SELECT COUNT(DISTINCT document_id) FROM document_shares WHERE user_id = ?');
$stmt->execute([$usuarioId]);
$sharedWithMe = (int) $stmt->fetchColumn();
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Documentos"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Gestión Documental"; $title = "Documentos"; include('partials/page-title.php'); ?>

                <?php if ($success === '1') : ?>
                    <div class="alert alert-success">Documento creado correctamente.</div>
                <?php elseif ($success === 'share') : ?>
                    <div class="alert alert-success">Documento compartido correctamente.</div>
                <?php elseif ($success === 'deleted') : ?>
                    <div class="alert alert-success">Documento eliminado correctamente.</div>
                <?php endif; ?>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="outlook-box gap-1">
                    <div class="offcanvas-lg offcanvas-start outlook-left-menu outlook-left-menu-md" tabindex="-1" id="documentSidebar">
                        <div class="card h-100 mb-0 rounded-0 border-0" data-simplebar>
                            <div class="card-body">
                                <button class="btn btn-danger fw-medium w-100" data-bs-toggle="modal" data-bs-target="#upload-modal">Subir archivos</button>

                                <div class="list-group list-group-flush list-custom mt-3">
                                    <a href="dms-documentos.php" class="list-group-item list-group-item-action active">
                                        <i class="ti ti-folder me-1 opacity-75 fs-lg align-middle"></i>
                                        <span class="align-middle">Mis archivos</span>
                                        <span class="badge align-middle bg-danger-subtle fs-xxs text-danger float-end"><?php echo (int) $totalDocumentos; ?></span>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <i class="ti ti-share align-middle me-1 opacity-75 fs-lg"></i>
                                        <span class="align-middle">Compartidos conmigo</span>
                                        <span class="badge align-middle bg-secondary-subtle fs-xxs text-secondary float-end"><?php echo (int) $sharedWithMe; ?></span>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <i class="ti ti-clock align-middle me-1 opacity-75 fs-lg"></i>
                                        <span class="align-middle">Recientes</span>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <i class="ti ti-star align-middle me-1 opacity-75 fs-lg"></i>
                                        <span class="align-middle">Favoritos</span>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <i class="ti ti-download align-middle me-1 opacity-75 fs-lg"></i>
                                        <span class="align-middle">Descargas</span>
                                    </a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <i class="ti ti-trash me-1 align-middle opacity-75 fs-lg"></i>
                                        <span class="align-middle">Papelera</span>
                                    </a>

                                    <div class="list-group-item mt-2 d-flex align-items-center justify-content-between">
                                        <span class="align-middle">Categorías</span>
                                        <a href="dms-categorias.php" class="btn btn-sm btn-light"><i class="ti ti-plus"></i></a>
                                    </div>

                                    <?php foreach ($categoryCounts as $categoria) : ?>
                                        <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                                            <span class="align-middle"><?php echo htmlspecialchars($categoria['nombre'], ENT_QUOTES, 'UTF-8'); ?></span>
                                            <span class="badge bg-light text-muted"><?php echo (int) $categoria['total']; ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card h-100 mb-0 rounded-0 flex-grow-1 border-0">
                        <div class="card-header border-light justify-content-between">
                            <div class="d-flex gap-2">
                                <div class="d-lg-none d-inline-flex gap-2">
                                    <button class="btn btn-default btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#documentSidebar" aria-controls="documentSidebar">
                                        <i class="ti ti-menu-2 fs-lg"></i>
                                    </button>
                                </div>
                                <div class="app-search">
                                    <input type="search" class="form-control" placeholder="Buscar archivos...">
                                    <i data-lucide="search" class="app-search-icon text-muted"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="me-2 fw-semibold">Filtrar por:</span>
                                <div class="app-search">
                                    <select class="form-select form-control my-1 my-md-0">
                                        <option value="">Tipo de archivo</option>
                                        <option>PDF</option>
                                        <option>DOCX</option>
                                        <option>XLSX</option>
                                        <option>PPTX</option>
                                    </select>
                                    <i data-lucide="file" class="app-search-icon text-muted"></i>
                                </div>
                                <button class="btn btn-light btn-icon">
                                    <i class="ti ti-filter"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body" style="height: calc(100% - 100px);" data-simplebar data-simplebar-md>
                            <div class="row g-2 mb-3">
                                <?php foreach (array_slice($documentos, 0, 4) as $documento) : ?>
                                    <div class="col-md-6 col-lg-4 col-xxl-3">
                                        <div class="card border border-dashed mb-0">
                                            <div class="card-body p-2">
                                                <div class="d-flex align-items-center justify-content-between gap-2">
                                                    <div class="flex-shrink-0 avatar-md bg-light bg-opacity-50 text-muted rounded-2">
                                                        <i class="ti ti-file-text fs-24 avatar-title"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="mb-1 fs-sm">
                                                            <a href="<?php echo htmlspecialchars($documento['archivo_ruta'] ?? '#', ENT_QUOTES, 'UTF-8'); ?>" class="link-reset">
                                                                <?php echo htmlspecialchars($documento['titulo'], ENT_QUOTES, 'UTF-8'); ?>
                                                            </a>
                                                        </h5>
                                                        <?php
                                                        $fileSize = '—';
                                                        if (!empty($documento['archivo_ruta'])) {
                                                            $filePath = __DIR__ . '/' . ltrim($documento['archivo_ruta'], '/');
                                                            $fileSize = is_file($filePath) ? format_file_size((int) filesize($filePath)) : '—';
                                                        }
                                                        ?>
                                                        <p class="text-muted mb-0 fs-xs"><?php echo htmlspecialchars($fileSize, ENT_QUOTES, 'UTF-8'); ?> · <?php echo htmlspecialchars($documento['categoria'] ?? 'Sin categoría', ENT_QUOTES, 'UTF-8'); ?></p>
                                                    </div>
                                                    <div class="dropdown flex-shrink-0 text-muted">
                                                        <a href="#" class="dropdown-toggle drop-arrow-none fs-xxl link-reset p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="<?php echo htmlspecialchars($documento['archivo_ruta'] ?? '#', ENT_QUOTES, 'UTF-8'); ?>" class="dropdown-item"><i class="ti ti-download me-1"></i> Descargar</a>
                                                            <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#share-modal-<?php echo (int) $documento['id']; ?>"><i class="ti ti-share me-1"></i> Compartir</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover table-centered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Categoría</th>
                                            <th>Tamaño</th>
                                            <th>Compartido con</th>
                                            <th>Última actualización</th>
                                            <th class="text-end">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($documentos)) : ?>
                                            <tr>
                                                <td colspan="7" class="text-muted text-center">Aún no hay documentos registrados.</td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php foreach ($documentos as $documento) : ?>
                                            <?php
                                            $fileSize = '—';
                                            if (!empty($documento['archivo_ruta'])) {
                                                $filePath = __DIR__ . '/' . ltrim($documento['archivo_ruta'], '/');
                                                $fileSize = is_file($filePath) ? format_file_size((int) filesize($filePath)) : '—';
                                            }
                                            $sharedLabel = (int) $documento['shared_total'] > 0 ? $documento['shared_total'] . ' usuarios' : '—';
                                            $lastUpdate = $documento['version_creada'] ? date('d/m/Y', strtotime($documento['version_creada'])) : '—';
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="avatar-xs rounded bg-light text-muted d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-file"></i>
                                                        </span>
                                                        <div>
                                                            <div class="fw-semibold"><?php echo htmlspecialchars($documento['titulo'], ENT_QUOTES, 'UTF-8'); ?></div>
                                                            <div class="text-muted fs-xs"><?php echo htmlspecialchars($documento['categoria'] ?? 'Sin categoría', ENT_QUOTES, 'UTF-8'); ?></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo htmlspecialchars(format_file_type($documento['archivo_tipo'] ?? null, $documento['archivo_ruta'] ?? null), ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td>
                                                    <span class="badge text-bg-primary"><?php echo htmlspecialchars($documento['categoria'] ?? 'Sin categoría', ENT_QUOTES, 'UTF-8'); ?></span>
                                                </td>
                                                <td><?php echo htmlspecialchars($fileSize, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($sharedLabel, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($lastUpdate, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td class="text-end">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-soft-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Acciones
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li>
                                                                <?php if (!empty($documento['archivo_ruta'])) : ?>
                                                                    <a class="dropdown-item" href="<?php echo htmlspecialchars($documento['archivo_ruta'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener">Abrir</a>
                                                                <?php else : ?>
                                                                    <span class="dropdown-item text-muted">Sin archivo</span>
                                                                <?php endif; ?>
                                                            </li>
                                                            <li>
                                                                <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#share-modal-<?php echo (int) $documento['id']; ?>">
                                                                    Compartir
                                                                </button>
                                                            </li>
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li>
                                                                <form method="post" class="px-3 py-1">
                                                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                                                    <input type="hidden" name="action" value="delete_document">
                                                                    <input type="hidden" name="document_id" value="<?php echo (int) $documento['id']; ?>">
                                                                    <button type="submit" class="btn btn-sm btn-outline-danger w-100">Eliminar</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
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

    <div class="modal fade" id="upload-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form method="post" class="row g-3 p-3" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="hidden" name="action" value="create_document">
                    <div class="modal-header">
                        <h5 class="modal-title">Subir documento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label" for="doc-titulo">Título</label>
                                <input type="text" id="doc-titulo" name="titulo" class="form-control" placeholder="Ej: Manual de procedimientos" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="doc-descripcion">Descripción</label>
                                <textarea id="doc-descripcion" name="descripcion" class="form-control" rows="2" placeholder="Resumen breve"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="doc-categoria">Categoría</label>
                                <select id="doc-categoria" name="categoria_id" class="form-select">
                                    <option value="">Selecciona</option>
                                    <?php foreach ($categorias as $categoria) : ?>
                                        <option value="<?php echo (int) $categoria['id']; ?>"><?php echo htmlspecialchars($categoria['nombre'], ENT_QUOTES, 'UTF-8'); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="doc-unidad">Unidad</label>
                                <select id="doc-unidad" name="unidad_id" class="form-select">
                                    <option value="">Selecciona</option>
                                    <?php foreach ($unidades as $unidad) : ?>
                                        <option value="<?php echo (int) $unidad['id']; ?>"><?php echo htmlspecialchars($unidad['nombre'], ENT_QUOTES, 'UTF-8'); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="doc-estado">Estado</label>
                                <select id="doc-estado" name="estado" class="form-select">
                                    <option value="vigente" selected>Vigente</option>
                                    <option value="revision">En revisión</option>
                                    <option value="vencido">Vencido</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="doc-version">Versión inicial</label>
                                <input type="text" id="doc-version" name="version" class="form-control" placeholder="v1.0" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="doc-vencimiento">Vencimiento</label>
                                <input type="date" id="doc-vencimiento" name="vencimiento" class="form-control">
                            </div>
                            <div class="col-md-7">
                                <label class="form-label" for="doc-archivo">Archivo</label>
                                <input type="file" id="doc-archivo" name="archivo" class="form-control" required>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="doc-tipo">Tipo de archivo</label>
                                <input type="text" id="doc-tipo" class="form-control" placeholder="Se detecta automáticamente" disabled>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Etiquetas</label>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php if (empty($etiquetas)) : ?>
                                        <span class="text-muted">Crea etiquetas en el módulo de categorías.</span>
                                    <?php endif; ?>
                                    <?php foreach ($etiquetas as $etiqueta) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tags[]" value="<?php echo (int) $etiqueta['id']; ?>" id="tag-<?php echo (int) $etiqueta['id']; ?>">
                                            <label class="form-check-label" for="tag-<?php echo (int) $etiqueta['id']; ?>">
                                                <?php echo htmlspecialchars($etiqueta['nombre'], ENT_QUOTES, 'UTF-8'); ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar documento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($documentos as $documento) : ?>
        <div class="modal fade" id="share-modal-<?php echo (int) $documento['id']; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="post">
                        <div class="modal-header">
                            <h5 class="modal-title">Compartir documento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="action" value="share_document">
                            <input type="hidden" name="document_id" value="<?php echo (int) $documento['id']; ?>">
                            <label class="form-label">Selecciona usuarios</label>
                            <?php $sharedUsers = $documentShareMap[(int) $documento['id']] ?? []; ?>
                            <select class="form-select" name="share_users[]" multiple size="6">
                                <?php foreach ($usuarios as $usuario) : ?>
                                    <option value="<?php echo (int) $usuario['id']; ?>" <?php echo in_array((int) $usuario['id'], $sharedUsers, true) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars(trim($usuario['nombre'] . ' ' . $usuario['apellido']), ENT_QUOTES, 'UTF-8'); ?>
                                        (<?php echo htmlspecialchars($usuario['correo'], ENT_QUOTES, 'UTF-8'); ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-text">Los usuarios seleccionados podrán acceder al documento.</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</body>

</html>
