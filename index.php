<?php
use App\Controllers\FrontendController;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$app = new FrontendController();
echo $app->articles();