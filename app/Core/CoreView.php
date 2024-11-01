<?php

namespace App\Core;

class CoreView
{
    protected $loader;
    protected $twig;

    public function __construct()
    {
        $this->setLoader('template/frontend//');
        $this->twig = new \Twig\Environment($this->loader, []);
    }

    public function setLoader($path)
    {
        $this->loader = new \Twig\Loader\FilesystemLoader($path);
    }

}
