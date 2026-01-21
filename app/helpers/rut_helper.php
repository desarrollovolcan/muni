<?php
function rut_normalizar(string $rut): string
{
    $rut = preg_replace('/\./', '', $rut);
    $rut = strtoupper($rut);
    if (strpos($rut, '-') === false && strlen($rut) > 1) {
        $rut = substr($rut, 0, -1) . '-' . substr($rut, -1);
    }
    return $rut;
}

function rut_validar(string $rut): bool
{
    $rut = rut_normalizar($rut);
    [$numero, $dv] = explode('-', $rut);
    $factor = 2;
    $suma = 0;
    for ($i = strlen($numero) - 1; $i >= 0; $i--) {
        $suma += $factor * intval($numero[$i]);
        $factor = $factor === 7 ? 2 : $factor + 1;
    }
    $resto = 11 - ($suma % 11);
    $dvCalculado = $resto === 11 ? '0' : ($resto === 10 ? 'K' : (string)$resto);
    return $dvCalculado === strtoupper($dv);
}

function rut_formatear(string $rut): string
{
    $rut = rut_normalizar($rut);
    [$numero, $dv] = explode('-', $rut);
    $numero = number_format((int)$numero, 0, '', '.');
    return $numero . '-' . $dv;
}
