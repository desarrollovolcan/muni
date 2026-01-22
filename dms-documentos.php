<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$success = $_GET['success'] ?? '';

$categorias = db()->query('SELECT id, nombre FROM document_categories ORDER BY nombre')->fetchAll();
$unidades = db()->query('SELECT id, nombre FROM unidades ORDER BY nombre')->fetchAll();
$etiquetas = db()->query('SELECT id, nombre FROM document_tags ORDER BY nombre')->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $titulo = trim($_POST['titulo'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $categoriaId = (int) ($_POST['categoria_id'] ?? 0);
    $unidadId = (int) ($_POST['unidad_id'] ?? 0);
    $estado = trim($_POST['estado'] ?? 'vigente');
    $version = trim($_POST['version'] ?? '');
    $archivoRuta = trim($_POST['archivo_ruta'] ?? '');
    $archivoTipo = trim($_POST['archivo_tipo'] ?? '');
    $vencimiento = trim($_POST['vencimiento'] ?? '');
    $tagsSeleccionados = $_POST['tags'] ?? [];

    if ($titulo === '') {
        $errors[] = 'El título del documento es obligatorio.';
    }
    if ($version === '') {
        $errors[] = 'La versión inicial es obligatoria.';
    }
    if ($archivoRuta === '' || $archivoTipo === '') {
        $errors[] = 'Completa la ruta y el tipo del archivo.';
    }

    $estadoPermitido = ['vigente', 'revision', 'vencido'];
    if (!in_array($estado, $estadoPermitido, true)) {
        $estado = 'vigente';
    }

    if (empty($errors)) {
        $usuarioId = $_SESSION['user']['id'] ?? 1;
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

$documentos = db()->query(
    'SELECT d.id, d.titulo, d.estado, c.nombre AS categoria, u.nombre AS unidad,
            v.version, v.vencimiento
     FROM documents d
     LEFT JOIN document_categories c ON c.id = d.categoria_id
     LEFT JOIN unidades u ON u.id = d.unidad_id
     LEFT JOIN document_versions v ON v.id = (
        SELECT dv.id FROM document_versions dv
        WHERE dv.document_id = d.id
        ORDER BY dv.created_at DESC
        LIMIT 1
     )
     ORDER BY d.created_at DESC'
)->fetchAll();
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
                                <h5 class="card-title mb-0">Nuevo documento</h5>
                                <p class="text-muted mb-0">Registra el documento y su primera versión en un solo paso.</p>
                            </div>
                            <div class="card-body">
                                <form method="post" class="row g-3">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="col-12">
                                        <label class="form-label" for="doc-titulo">Título</label>
                                        <input type="text" id="doc-titulo" name="titulo" class="form-control" placeholder="Ej: Manual de procedimientos" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="doc-descripcion">Descripción</label>
                                        <textarea id="doc-descripcion" name="descripcion" class="form-control" rows="2" placeholder="Resumen breve"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="doc-categoria">Categoría</label>
                                        <select id="doc-categoria" name="categoria_id" class="form-select">
                                            <option value="">Selecciona</option>
                                            <?php foreach ($categorias as $categoria) : ?>
                                                <option value="<?php echo (int) $categoria['id']; ?>"><?php echo htmlspecialchars($categoria['nombre'], ENT_QUOTES, 'UTF-8'); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="doc-unidad">Unidad</label>
                                        <select id="doc-unidad" name="unidad_id" class="form-select">
                                            <option value="">Selecciona</option>
                                            <?php foreach ($unidades as $unidad) : ?>
                                                <option value="<?php echo (int) $unidad['id']; ?>"><?php echo htmlspecialchars($unidad['nombre'], ENT_QUOTES, 'UTF-8'); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="doc-estado">Estado</label>
                                        <select id="doc-estado" name="estado" class="form-select">
                                            <option value="vigente" selected>Vigente</option>
                                            <option value="revision">En revisión</option>
                                            <option value="vencido">Vencido</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="doc-version">Versión inicial</label>
                                        <input type="text" id="doc-version" name="version" class="form-control" placeholder="v1.0" required>
                                    </div>
                                    <div class="col-md-7">
                                        <label class="form-label" for="doc-ruta">Ruta del archivo</label>
                                        <input type="text" id="doc-ruta" name="archivo_ruta" class="form-control" placeholder="/docs/manual.pdf" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label" for="doc-tipo">Tipo de archivo</label>
                                        <input type="text" id="doc-tipo" name="archivo_tipo" class="form-control" placeholder="PDF" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="doc-vencimiento">Vencimiento</label>
                                        <input type="date" id="doc-vencimiento" name="vencimiento" class="form-control">
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
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100">Guardar documento</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Repositorio documental</h5>
                                    <p class="text-muted mb-0">Controla versiones, accesos por unidad y fechas de vencimiento.</p>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <a class="btn btn-outline-secondary" href="dms-categorias.php">Gestionar categorías</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Documento</th>
                                                <th>Categoría</th>
                                                <th>Unidad</th>
                                                <th>Versión</th>
                                                <th>Estado</th>
                                                <th>Vencimiento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($documentos)) : ?>
                                                <tr>
                                                    <td colspan="6" class="text-muted text-center">Aún no hay documentos registrados.</td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php foreach ($documentos as $documento) : ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($documento['titulo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td><?php echo htmlspecialchars($documento['categoria'] ?? '—', ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td><?php echo htmlspecialchars($documento['unidad'] ?? '—', ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td><?php echo htmlspecialchars($documento['version'] ?? '—', ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td>
                                                        <?php
                                                        $estado = $documento['estado'] ?? 'vigente';
                                                        $badge = $estado === 'vigente' ? 'success' : ($estado === 'revision' ? 'warning' : 'danger');
                                                        ?>
                                                        <span class="badge text-bg-<?php echo $badge; ?>">
                                                            <?php echo htmlspecialchars(ucfirst($estado), ENT_QUOTES, 'UTF-8'); ?>
                                                        </span>
                                                    </td>
                                                    <td><?php echo $documento['vencimiento'] ? htmlspecialchars(date('d/m/Y', strtotime($documento['vencimiento'])), ENT_QUOTES, 'UTF-8') : '—'; ?></td>
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
