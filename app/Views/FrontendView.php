<?php

namespace App\Views;

class FrontendView
{
 // разделить на все и на одну
    function renderSingleArticleCard($article): string
    { return
        '            <div class="col" >
                    <div class="card shadow-sm">                        <img src="./' . $article['image'] . '" alt="">
                        <div class="card-body">                        <h5 class="card-title">' . $article['title'] . '</h5>
                        <p class="card-text">' . $article['content'] . '</p>                        <a href="/index.php" class="card-link">Вернуться на главную...</a>
                        </div>                    </div>
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
}