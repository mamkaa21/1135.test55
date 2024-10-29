<?php

namespace App\Views;

use Couchbase\View;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class FrontendView
{
    private  $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader( "./template");
        $this->twig = new Environment($loader);
    }

    function renderArticlesCardList(): string
    {
        $articles = getArticles();
        $content = '';
        foreach ($articles as $article) {
            $content .= renderArticleCard($article);
        }    return $content;
    }

    public function showIndexPage()
    {
        $title = 'Главная страница';
        $description = 'Описание Главной страницы';
//        $template = $this->twig->load('index.twig');
//        echo $template->render(['title' => $title, 'description' => $description ]);
        echo $this->twig->render('index.twig', ['title' => $title, 'description' => $description]);
    }

    public function renderBlogJsonPage($articles)
    {
        $title = 'Блог на Json';
        $description = 'Вывод всех статей';
        echo $this->twig->render('articlesList.twig',compact('title', 'description', 'articles'));
    }
    public function renderSinglePageJsonBlog($article)
    {
        $title = 'Блог на Json';
        $description = 'Вывод стастьи';
        echo $this->twig->render('singleArticlePage.twig',compact('title', 'description', 'article'));
    }
}