<?php
use App\Core\Csrf;

function csrf_field(): void
{
    echo '<input type="hidden" name="_token" value="' . Csrf::token() . '">';
}

function flash(string $key): ?string
{
    if (isset($_SESSION[$key])) {
        $msg = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $msg;
    }
    return null;
}
