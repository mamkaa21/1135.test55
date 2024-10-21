<?php
require_once 'vendor/autoload.php';
use Laminas\Diactoros\Response\HtmlResponse;
use MiladRahimi\PhpRouter\Router;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use Laminas\Diactoros\Response\JsonResponse;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

//$app = new FrontendController();
//echo $app->articles();

$router = Router::create();

$router->get('/', [\App\Controllers\FrontendController::class, 'showBlogJsonPage']);
$router->get('/page/{id}', [\App\Controllers\FrontendController::class, 'showSinglePageJsonBlog']);
$router->get('/page/{id}', [\App\Controllers\FrontendController::class, 'showSinglePageJsonBlog']);
try {
    $router->dispatch();
}
catch (RouteNotFoundException $e) {
    $router->getPublisher()->publish(new HtmlResponse('Not found', 404));
}
catch (Throwable $e) {
    $router->getPublisher()->publish(new HtmlResponse('Internal error' . $e->getMessage(), 500));
}

