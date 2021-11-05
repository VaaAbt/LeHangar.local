<?php
/** @var App $app */

use App\Controller\AuthController;
use App\Controller\AboutController;
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
$app->get('/products/addToCart/{id}/removeAll', [ProductController::class, 'removeProductFromCart']);

$app->get('/cart', [CartController::class, 'getCartView']);

$app->get('/detailedProduct/{id}', [ProductController::class, 'getProductById']);
$app->post('/detailedProduct/addToCart/{id}', [ProductController::class, 'addDetailedProductToCart']);
$app->post('/cart', [CartController::class, 'orderCart']);

$app->get('/growers', [GrowerController::class, 'getAllGrowers']);

$app->get('/login', [AuthController::class, 'loginView']);
$app->post('/login', [AuthController::class, 'login']);

$app->get('/logout', [AuthController::class, 'logout']);

$app->get('/detailedGrower/{id}', [GrowerController::class, 'getGrowerById']);

$app->get('/about', [AboutController::class, 'about']);


//Manager and Grower view
$app->get('/grower/myPage/{id}', [GrowerController::class, 'productsView']);
//$app->get('/manager/myPage', [ManagerController::class, 'managerView']);


