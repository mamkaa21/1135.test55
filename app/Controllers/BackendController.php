<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Views\BackendView;

class BackendController
{
    public function __construct()
    {
        $this->model = new ArticleModel();
        $this->view = new BackendView();
    }

    public function index()
    {
        $this->view->index();
    }
}