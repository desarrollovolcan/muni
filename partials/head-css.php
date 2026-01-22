<?php
require_once __DIR__ . '/../app/bootstrap.php';
$municipalidad = get_municipalidad();
$primaryColor = $municipalidad['color_primary'] ?? '#6658dd';
$secondaryColor = $municipalidad['color_secondary'] ?? '#4a81d4';
$logoPath = $municipalidad['logo_path'] ?? 'assets/images/logo.png';
$logoTopbarHeight = $municipalidad['logo_topbar_height'] ?? 56;
$logoLoginHeight = $municipalidad['logo_login_height'] ?? 48;
$logoSidenavHeight = $municipalidad['logo_sidenav_height'] ?? 48;
$logoSidenavHeightSm = $municipalidad['logo_sidenav_height_sm'] ?? 36;
$primaryRgb = hex_to_rgb($primaryColor) ?? [102, 88, 221];
$secondaryRgb = hex_to_rgb($secondaryColor) ?? [74, 129, 212];
?>

<!-- Theme Config Js -->
<script src="assets/js/config.js"></script>

<!-- Vendor css -->
<link href="assets/css/vendors.min.css" rel="stylesheet" type="text/css">

<!-- App css -->
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css">

<!-- Favicon -->
<link rel="icon" href="<?php echo htmlspecialchars($logoPath, ENT_QUOTES, 'UTF-8'); ?>" type="image/png">

<style>
    :root {
        --ins-primary: <?php echo htmlspecialchars($primaryColor, ENT_QUOTES, 'UTF-8'); ?>;
        --ins-primary-rgb: <?php echo (int) $primaryRgb[0]; ?>, <?php echo (int) $primaryRgb[1]; ?>, <?php echo (int) $primaryRgb[2]; ?>;
        --ins-secondary: <?php echo htmlspecialchars($secondaryColor, ENT_QUOTES, 'UTF-8'); ?>;
        --ins-secondary-rgb: <?php echo (int) $secondaryRgb[0]; ?>, <?php echo (int) $secondaryRgb[1]; ?>, <?php echo (int) $secondaryRgb[2]; ?>;
        --bs-primary: <?php echo htmlspecialchars($primaryColor, ENT_QUOTES, 'UTF-8'); ?>;
        --bs-primary-rgb: <?php echo (int) $primaryRgb[0]; ?>, <?php echo (int) $primaryRgb[1]; ?>, <?php echo (int) $primaryRgb[2]; ?>;
        --bs-secondary: <?php echo htmlspecialchars($secondaryColor, ENT_QUOTES, 'UTF-8'); ?>;
        --bs-secondary-rgb: <?php echo (int) $secondaryRgb[0]; ?>, <?php echo (int) $secondaryRgb[1]; ?>, <?php echo (int) $secondaryRgb[2]; ?>;
        --ins-topbar-logo-height: <?php echo (int) $logoTopbarHeight; ?>px;
        --ins-login-logo-height: <?php echo (int) $logoLoginHeight; ?>px;
        --ins-logo-lg-height: <?php echo (int) $logoSidenavHeight; ?>px;
        --ins-logo-sm-height: <?php echo (int) $logoSidenavHeightSm; ?>px;
    }

    .side-nav-title {
        font-size: 0.7rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: rgba(var(--ins-body-color-rgb), 0.6);
    }

    .side-nav .side-nav-item .side-nav-link {
        border-radius: 0.5rem;
        padding: 0.55rem 0.85rem;
        margin: 0.15rem 0.5rem;
    }

    .side-nav .side-nav-item .side-nav-link:hover {
        background-color: rgba(var(--ins-primary-rgb), 0.08);
    }

    .side-nav .side-nav-item.active > .side-nav-link {
        background-color: rgba(var(--ins-primary-rgb), 0.15);
    }
</style>
