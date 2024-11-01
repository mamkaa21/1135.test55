<?php

namespace App\Controllers;

use App\Models\DbArticle;
use App\Views\BackendView;
use Laminas\Diactoros\ServerRequest;
use App\Core\Helper;

class BackendController
{
    protected $view;
    private  $model;
    public function __construct()
    {
        $this->model = new DbArticle();
        $this->view = new BackendView();
    }

    public function index()
    {
        $this->view->index();
    }

    public function showCreateArticleForm()
    {
        echo $this->view->renderCreateArticlePage();
    }
    public function showEditArticleForm($id)
    {
        $article = $this->model->find($id);
        echo $this->view->renderEditArticlePage($article);
    }
    public function storeArticle(ServerRequest $request)
    {
        $article = $request->getParsedBody();
        $this->model->store($article);
        Helper::goToUrl('/admin/articles');
    }
    public function updateArticle(ServerRequest $request)
    {
        $article = $request->getParsedBody();
        $this->model->update($article);
        Helper::goToUrl('/admin/articles');
    }
    public function showArticlesTable()
    {
        $articles = $this->model->getAll();
        echo $this->view->showArticlesTable($articles);
    }
}