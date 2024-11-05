<?php

namespace App\Views;
use App\Core\CoreView;

class FrontendView extends CoreView
{
    function renderArticlesCardList(): string
    {
        $articles = getAll();
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
        echo $this->twig->render('/frontend/layout.twig', ['title' => $title, 'description' => $description]);
    }

    public function renderArticlesListPage($articles)
    {
        $title = 'Блог на Json';
        $description = 'Вывод всех статей';
        echo $this->twig->render('articlesList.twig',compact('title', 'description', 'articles'));
    }
    public function renderSingleArticlePage($article)
    {
        $title = 'Блог на Json';
        $description = 'Вывод стастьи';
        echo $this->twig->render('singleArticlePage.twig',compact('title', 'description', 'article'));
    }

}