<?php

namespace App\Views;

use App\Core\CoreView;
use App\Core\Helper;

class BackendView extends CoreView
{
    public $formr;
    public function __construct()
    {
        $this->setLoader('template/backend/');
        $this->twig = new \Twig\Environment($this->loader, []);
    }
    public function index()
    {
        $pagetitle = "Admin Panel";
        echo $this->twig->render('/index.twig');
    }

    public function renderEditArticlePage($article)
    {
        $pagetitle = "Редактирование статьи ID #".$article['id'];
        return $this->twig->render('/partials/editArticle.twig',compact('pagetitle','article'));
    }
    public function renderCreateArticlePage()
    {
        $pagetitle = "Добавление новой статьи";
        return $this->twig->render('partials/createArticle.twig',compact('pagetitle'));
    }

    public function showArticlesTable(array $articles)
    {
        $pagetitle = "Список статей";
        return $this->twig->render('/partials/index-table.twig',compact('articles','pagetitle'));
    }

}