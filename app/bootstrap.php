<?php

declare(strict_types=1);

use MiladRahimi\PhpRouter\Router;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\HtmlResponse;

$router = Router::create();

$router->get('/', [\App\Controllers\FrontendController::class, 'showArticlesListPage']);
$router->get('/page/{id}', [\App\Controllers\FrontendController::class, 'showSingleArticlePage']);
$router->get('/admin', [\App\Controllers\BackendController::class, 'index']);
$router->get('/admin/articles', [\App\Controllers\BackendController::class, 'showArticlesTable']);
$router->get('/admin/create', [\App\Controllers\BackendController::class, 'showCreateArticleForm']);
$router->get('/admin/edit', [\App\Controllers\BackendController::class, 'storeArticle']);
$router->get('/admin/store', [\App\Controllers\BackendController::class, 'showEditArticleForm']);
$router->get('/admin/delete', [\App\Controllers\BackendController::class, 'updateArticle']);
$router->get('/authorization', [\App\Controllers\FrontendController::class, 'ShowAuthorizationPage']);
$router->post('/authorization/enter', [\App\Controllers\BackendController::class, 'EnterAuthorization']);
$router->get('/authorization/exit', [\App\Controllers\FrontendController::class, 'showArticlesListPage']);





$router->dispatch();
/*
try {
}
catch (RouteNotFoundException $e) {
    $router->getPublisher()->publish(new HtmlResponse('Not found', 404));
}
catch (Throwable $e) {
    $router->getPublisher()->publish(new HtmlResponse('Internal error' . $e->getMessage(), 500));
}*/

