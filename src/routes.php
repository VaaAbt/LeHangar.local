<?php
/** @var App $app */

use App\Controller\HomeController;
use App\Controller\ProductController;
use Slim\App;
use Slim\Exception\HttpNotFoundException;
use Slim\Routing\RouteCollectorProxy;

/**
 * ----------------
 * Routes
 * ----------------
 */
$app->get('/', [HomeController::class, 'index']);

$app->get('/products', [ProductController::class, 'getAllProducts']);