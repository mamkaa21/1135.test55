<?php
 namespace App\Controllers;

use App\Models\ArticleModel;
use App\Views\FrontendView;

class FrontendController
{
    public function __construct()
    {
        $this->model = new ArticleModel();
        $this->view = new FrontendView();
    }

    public function articles()
    {
        $this->model->getArticles();
    }

    public function singleArticle($id)
    {

        $this->model->getArticleById($id);
    }
}