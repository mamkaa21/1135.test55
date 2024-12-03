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
    function getAll() : array
    {
        return json_decode(file_get_contents( $this->storage_path), true);
    }
    function find(int $id):array
    {
        $articleList = $this->getAll();
        $curentArticle = [];
        if (array_key_exists($id, $articleList)) {
            $curentArticle = $articleList[$id];
        }
        return $curentArticle;
    }
}