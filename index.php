<?php
use App\Controllers\FrontendController;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$app = new FrontendController();
echo $app->articles();


require __DIR__ . "/../vendor/autoload.php";

use MinasRouter\Router\Route;

// The second argument is optional. It separates the Controller and Method from the string
// Example: "Controller@method"
Route::start("http://yourdomain.com", "@");

Route::get('/', function()
{
    Route::get('/article', [App\Controllers\ArticleModel::class, 'index']);
});

// Sometimes you may need to register a route that responds to multiple HTTP verbs:
//Route::match(["GET", "POST"], "/", function() {
//    // ...
//});

// You will put all your routes before this function
Route::execute();