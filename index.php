<?php

declare(strict_types=1);

function front_controller_base_path(): string
{
    $documentRoot = realpath((string) ($_SERVER['DOCUMENT_ROOT'] ?? ''));
    $projectRoot = realpath(__DIR__);

    if ($documentRoot !== false && $projectRoot !== false && str_starts_with($projectRoot, $documentRoot)) {
        $relativePath = trim(str_replace(DIRECTORY_SEPARATOR, '/', substr($projectRoot, strlen($documentRoot))), '/');

        return $relativePath !== '' ? '/' . $relativePath : '';
    }

    $scriptName = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? ''));
    $scriptDirectory = rtrim(dirname($scriptName), '/');

    return $scriptDirectory === '/' ? '' : $scriptDirectory;
}

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
$basePath = front_controller_base_path();

if ($requestPath !== null && $basePath !== '' && str_starts_with($requestPath, $basePath)) {
    $requestPath = substr($requestPath, strlen($basePath));
}

$targetPath = $requestPath !== null ? ltrim($requestPath, '/') : '';

if ($targetPath !== '' && $targetPath !== 'index.php') {
    $targetFile = __DIR__ . '/' . $targetPath;
    if (is_file($targetFile)) {
        require $targetFile;
        exit;
    }
}

require __DIR__ . '/app/bootstrap.php';

redirect('auth-2-sign-in.php');
