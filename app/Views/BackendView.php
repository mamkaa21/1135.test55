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
        echo $this->twig->render('index.twig', compact('pagetitle'));

    }

    public function renderEditArticlePage($article)
    {
        $pagetitle = "Редактирование статьи ID #".$article['id'];
        return $this->twig->render('editArticle.twig',compact('pagetitle','article'));
    }
    public function renderCreateArticlePage()
    {
        $pagetitle = "Добавление новой статьи";
        return $this->twig->render('createArticle.twig',compact('pagetitle'));
    }

    public function showArticlesTable(array $articles)
    {
        /*
        echo '<p>' . $article["id"] . '</p>
            <img src="/1135/' . $article["image"] . '"  alt="">';*/
        //$pagetitle = "Список статей";
        /*
        foreach($articles as $article)
        {
            //var_dump($article["image"]);
            echo '<p>' . $article["id"] . '</p>
            <img src="/1135/' . $article["image"] . '"  alt="">';
        }*/
        return $this->twig->render('index-table.twig',compact('articles'));
    }

}