<?php

declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

if (isset($_SESSION['user'])) {
    redirect('dashboard.php');
}

redirect('auth-2-sign-in.php');
