<?php

namespace App\Models;

class ArticleModel
{
    protected $storage_path;
    public function __construct()
    {
        $this->setStoragePath('1135/db/articles.json');
    }

    public function setStoragePath( $path)
    {
        $this->storage_path = $path;
    }

    function getArticles() : array
    {
        return json_decode(file_get_contents( $this->storage_path), true);
    }

    function getArticleById(int $id):array
    {
        $articleList = $this->getArticles();
        $curentArticle = [];
        if (array_key_exists($id, $articleList)) {
            $curentArticle = $articleList[$id];
        }
        return $curentArticle;
    }
}