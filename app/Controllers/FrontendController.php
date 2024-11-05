<?php
 namespace App\Controllers;
 use App\Core\CoreController;
 use App\Core\Helper as h;
use App\Models\ArticleModel;
use App\Views\FrontendView;

class FrontendController
{
    protected $view;
    private  $model;
    public function __construct()
    {
        $this->model = new ArticleModel();
        $this->view = new FrontendView();
    }

    public function index()
    {
        $this->view->showIndexPage();
    }

    public function showArticlesListPage()
    {
        $articles = $this->model->getAll();
        $this->view->renderArticlesListPage($articles);
    }
    public function showSingleArticlePage(int $id)
    {
        $article = $this->model->find($id);
        $this->view->renderSingleArticlePage($article);
    }

    public  function  showArticleAdd()
    {

    }
}
