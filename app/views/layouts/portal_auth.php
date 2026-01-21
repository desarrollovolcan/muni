<!doctype html>
<html lang="es">
<head>
    <?php include __DIR__ . '/../../../tema/src/partials/title-meta.php'; ?>
    <?php include __DIR__ . '/../../../tema/src/partials/head-css.php'; ?>
</head>
<body class="authentication-bg authentication-bg-pattern d-flex align-items-center py-4 py-sm-5">
    <div class="account-pages w-100">
        <div class="container">
            <?= $content ?? '' ?>
        </div>
    </div>
    <?php include __DIR__ . '/../../../tema/src/partials/footer-scripts.php'; ?>
</body>
</html>
