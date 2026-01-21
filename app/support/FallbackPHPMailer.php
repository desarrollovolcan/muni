<?php
namespace PHPMailer\PHPMailer;

use Exception as BaseException;

class Exception extends BaseException
{
}

class PHPMailer
{
    public const ENCRYPTION_STARTTLS = 'tls';

    public function isSMTP(): void
    {
    }

    public function __set($name, $value): void
    {
        $this->$name = $value;
    }

    public function setFrom($address, $name = ''): void
    {
    }

    public function addAddress($address, $name = ''): void
    {
    }

    public function Subject($subject = null): void
    {
    }

    public function Body($body = null): void
    {
    }

    public function isHTML($isHtml = true): void
    {
    }

    public function send(): bool
    {
        throw new Exception('PHPMailer dependencies are not installed.');
    }
}
