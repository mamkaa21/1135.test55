<?php

namespace App\Models;

class ArticleModel
{
    function getArticles() : array
    {
        return json_decode(file_get_contents('1135/db/articles.json'), true);
    }

    function getArticleById(int $id):array
    {
        $articleList =getArticles();
        $curentArticle = [];
        if (array_key_exists($id, $articleList)) {
            $curentArticle = $articleList[$id];
        }
        return $curentArticle;
    }
}