<?php
use App\Core\Auth;
Auth::startSession();
?>
<!doctype html>
<html lang="es">
<head>
    <?php include __DIR__ . '/../../../tema/src/partials/title-meta.php'; ?>
    <?php include __DIR__ . '/../../../tema/src/partials/head-css.php'; ?>
</head>
<body>
<div id="layout-wrapper">
    <?php include __DIR__ . '/../../../tema/src/partials/topbar.php'; ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <?php include __DIR__ . '/../partials/flash.php'; ?>
                <?= $content ?? '' ?>
            </div>
        </div>
        <?php include __DIR__ . '/../../../tema/src/partials/footer.php'; ?>
    </div>
</div>
<?php include __DIR__ . '/../../../tema/src/partials/footer-scripts.php'; ?>
</body>
</html>
