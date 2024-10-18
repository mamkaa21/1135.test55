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

    // разделить на все и на одну
    function renderSingleArticleCard($article): string
    { return
        '            <div class="col" >
                    <div class="card shadow-sm">                        
                    <img src= "./{{ article.image }}" alt="">
                        <div class="card-body">                        
                        <h5 class="card-title">{{ article.title }}</h5>
                        <p class="card-text">{{ article.content}}</p>                        
                        <a href="/index.php" class="card-link">Вернуться на главную...</a>
                        </div>                    
                        </div>
                </div>';
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