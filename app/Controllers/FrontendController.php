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
        $article = $this->model->getArticles();
    }

    public function singleArticle($id)
    {
        $this->model->getArticleById($id);
    }

    public function index()
    {
        $this->view->showIndexPage();
    }

    public function showBlogJsonPage()
    {
        $articles = $this->model->getArticles();
        $this->view->renderBlogJsonPage($articles);
    }
    public function showSinglePageJsonBlog($id)
    {
        $article = $this->model->getArticleById($id);
        $this->view->renderSinglePageJsonBlog($article);
    }
}
