<?php

use App\Utils\Auth;
use App\Utils\FlashMessages;
use DI\Container;
use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Twig\TwigFunction;

return static function (App $app) {
    /** @var Container $container */
    $container = $app->getContainer();

    // Create Twig
    $twig = Twig::create('../src/View', ['cache' => false, 'debug' => true]);

    $environment = $twig->getEnvironment();
    $environment->addGlobal('cart', $_SESSION['cart']);

    // Add twig to container
    $container->set('twig', $twig);
};