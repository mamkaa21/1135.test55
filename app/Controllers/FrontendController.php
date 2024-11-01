<?php
 namespace App\Controllers;
 use App\Core\CoreController;
 use App\Core\Helper as h;
use App\Models\ArticleModel;
use App\Views\FrontendView;

class FrontendController
{
    public function __construct()
    {
        $this->model = new ArticleModel();
        $this->view = new FrontendView();
    }

    public function index()
    {
        $this->view->showIndexPage();
    }

    public function showBlogJsonPage()
    {
//        $articles = $this->model->getArticles();
//        $this->view->renderBlogJsonPage($articles);

        $articles = $this->model->getAll();
        $this->view->renderArticlesListPage($articles);
    }
    public function showSinglePageJsonBlog(int $id)
    {
//        $article = $this->model->getArticleById($id);
//        $this->view->renderSinglePageJsonBlog($article);

        $article = $this->model->find($id);
        $this->view->renderSingleArticlePage($article);
    }

    public  function  showArticleAdd()
    {

    }
}
