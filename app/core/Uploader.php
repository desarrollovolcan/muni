<?php
namespace App\Core;

class Uploader
{
    private array $allowed = ['pdf','jpg','jpeg','png'];
    private int $maxSize = 8 * 1024 * 1024;

    public function upload(array $file, string $targetDir, string $prefix): ?string
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $this->allowed)) {
            return null;
        }
        if ($file['size'] > $this->maxSize) {
            return null;
        }
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0775, true);
        }
        $name = sprintf('%s_%s.%s', $prefix, time() . '_' . bin2hex(random_bytes(3)), $ext);
        $path = rtrim($targetDir, '/') . '/' . $name;
        if (move_uploaded_file($file['tmp_name'], $path)) {
            return $path;
        }
        return null;
    }
}
