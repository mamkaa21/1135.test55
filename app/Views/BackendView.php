<?php

namespace App\Views;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BackendView
{
    private  $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader( "./template");
        $this->twig = new Environment($loader);
    }
    public function index()
    {
        echo $this->twig->render('/backend/index.twig');
    }
}