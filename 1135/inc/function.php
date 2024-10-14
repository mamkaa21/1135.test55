<?php
/**
 * @param $some
 * отладочная функция
 */
function dd($some){
    echo '<pre>';
    print_r($some);
    echo '</pre>';
    exit();
}

/**
 * @param $url
 * редирект на указаный URL
 */
function goUrl(string $url){
    echo '<script type="text/javascript">location="';
    echo $url;
    echo '";</script>';
}

/**
 * функция возвращает масив статей
 * @return array
 */
function getArticles() : array
{
    return json_decode(file_get_contents('1135/db/articles.json'), true);
}

/**
 * функция возвращает статью  в виде масива по id
 * @param int $id
 * @return array
 */
function getArticleById(int $id):array
{
    $articleList =getArticles();
    $curentArticle = [];
    if (array_key_exists($id, $articleList)) {
        $curentArticle = $articleList[$id];
    }
    //dd($curentArticle);
    return $curentArticle;
}

/**
 * функция генерирует список <li> из Json
 * и формирует ссылки вида URI index.php?id=1
 *
 * @return string
 */
function getArticleList(): string
{
    $articles = getArticles();
    $link = '';
    foreach ($articles as $article) {
        $link .= '<li class="nav-item"><a class="nav-link" href="index.php?id='. $article['id']
            . '">'. $article['title']. '</a></li>';
    }
    return $link;
}

//Main
/**
 * @return string
 */
function main(): string
{
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $article = getArticleById($id);
    } else {
        $article = '';
    }

    if (empty($article)) {
        $content = blogEntrysList();
    } else {
        $content = blogEntryWrapper($article, true);
    }
    return $content;
}

/**
 * @return string
 */
function blogEntrysList(): string
{
    $articles = getArticles();
    $blog_entrys_list = '';
    foreach ($articles as $article) {
        $blog_entrys_list .= blogEntryWrapper($article);
    }
    return $blog_entrys_list;
}

/**
 * @param array $article
 * @param $single
 * @return string
 */
function blogEntryWrapper(array $article, $single = false): string
{
    $wraped_article = '<article class="entry">
    <div class="entry-img">
        <img src="' . $article['image'] . '" alt="" class="img-fluid">
    </div>
    <h2 class="entry-title">
        <a href="index.php?id=' . $article['id']
        . '">' . $article['title'] . '</a>
    </h2>
    <div class="entry-meta">
        <ul>
            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">Admin</a></li>
        </ul>
    </div>
    <div class="entry-content">';
    if ($single == true) {
        $wraped_article .= '<p>' . $article['content'] . '</p>';
    } else {

        $wraped_article .= '<div class="read-more">
            <a href="index.php?id=' . $article['id']
            . '">Read More</a>
        </div>';
    }
    $wraped_article .= '</div></article>';
    return $wraped_article;
}

/**
 * Вывод последних 5ти новостей
 * @return string
 */
function sidebar(): string
{
    $articles = getArticles();
    $articles = array_reverse($articles);
    $content = '';
    for($i=0;$i<=4;$i++)
    {
        $content .= '<div class="post-item clearfix">
            <picture>
                <img src="' . $articles[$i]['image'] . '"  class="img-fluid img-thumbnail" alt="...">
            </picture>
            <h4><a href="index.php?id=' . $articles[$i]['id'] . '">' . $articles[$i]['title'] . '</a></h4>
        </div>';
    }
    return $content;
}

function getNumber(): string
{
    $result = '';
    if (empty($_GET))
    {
        return 'Ничего не передано!';
    }

    if (empty($_GET['operation']))
    {
        return 'Не передана операция';
    }

    if (empty($_GET['number1']) || empty($_GET['number2']))
    {
        return 'Не переданы аргументы';
    }

    $x1 = $_GET['number1'];
    $x2 = $_GET['number2'];

    switch ($_GET['operation']) {
        case 'plus':
            $result = $x1 + $x2;
            break;
        case 'minus':
            $result = $x1 - $x2;
            break;
        default:
            return 'Операция не поддерживается';

    }
    $content = '<a>' . $result .'</a>';
    return $content;
}



function renderSingleArticleCard($article): string
{ return
    '            <div class="col" >
                    <div class="card shadow-sm">                        <img src="./' . $article['image'] . '" alt="">
                        <div class="card-body">                        <h5 class="card-title">' . $article['title'] . '</h5>
                        <p class="card-text">' . $article['content'] . '</p>                        <a href="/index.php" class="card-link">Вернуться на главную...</a>
                        </div>                    </div>
                </div>';
}
function renderArticleCard($article): string
{
    return '
<div class="col-4 mb-3">
                    <div class="card shadow-sm"> 
                        <img src="./' . $article['image'] . '" width="100%" height="225" alt="">
                        <div class="card-body" >                        
                        <h5 class="card-title">' . $article['title'] . ' </h5>
                            <div class="d-flex justify-content-between align-items-center">                                    
                            <a href="index.php?id=' . $article['id'] . '"  class="btn btn-sm btn-outline-secondary">Подробнее</a>                          
                            </div>                        
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