<?php

namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Loader
{
    private  $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader( "./template");
        $this->twig = new Environment($loader);
        return $this->twig;
    }

}