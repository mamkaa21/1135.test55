<?php

declare(strict_types=1);

use Laminas\Diactoros\Response\HtmlResponse;
use MiladRahimi\PhpRouter\Router;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use Laminas\Diactoros\Response\JsonResponse;


$router = Router::create();

$router->get('/', [\App\Controllers\FrontendController::class, 'showBlogJsonPage']);
$router->get('/page/{id}', [\App\Controllers\FrontendController::class, 'showSinglePageJsonBlog']);
$router->get('/admin', [\App\Controllers\BackendController::class, 'index']);
$router->get('/admin/create', [\App\Controllers\BackendController::class, 'showCreateArticleForm']);
$router->get('/admin/edit', [\App\Controllers\BackendController::class, 'showCreateArticleForm']);
$router->get('/admin/update', [\App\Controllers\BackendController::class, 'showCreateArticleForm']);
$router->get('/admin/delete', [\App\Controllers\BackendController::class, 'showCreateArticleForm']);




try {
    $router->dispatch();
}
catch (RouteNotFoundException $e) {
    $router->getPublisher()->publish(new HtmlResponse('Not found', 404));
}
catch (Throwable $e) {
    $router->getPublisher()->publish(new HtmlResponse('Internal error' . $e->getMessage(), 500));
}

