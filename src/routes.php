<?php
/** @var App $app */

use App\Controller\GrowerController;
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
$app->get('/products/category/{id}', [ProductController::class, 'getProductsByCategory']);

$app->get('/products/addToCart/{id}/addOne', [ProductController::class, 'addProductQuantityToCart']);

$app->get('/products/addToCart/{id}/removeOne', [ProductController::class, 'removeProductQuantityToCart']);

$app->get('/cart', [CartController::class, 'getCartView']);

$app->get('/detailedProduct/{id}', [ProductController::class, 'getProductById']);
$app->post('/detailedProduct/addToCart/{id}', [ProductController::class, 'addDetailedProductToCart']);
$app->post('/cart', [CartController::class, 'orderCart']);

$app->get('/growers', [GrowerController::class, 'getAllGrowers']);
