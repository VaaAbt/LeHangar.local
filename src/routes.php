<?php
/** @var App $app */

use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Controller\CartController;
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
$app->post('/products/addToCart/{id}', [ProductController::class, 'addProductToCart']);

$app->get('/cart', [CartController::class, 'getCartView']);