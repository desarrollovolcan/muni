<?php
namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    protected string $layout = 'layouts/auth.php';

    public function index(): void
    {
        $this->render('home/index.php');
    }
}
