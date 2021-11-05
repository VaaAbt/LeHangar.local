<?php

use App\Model\Utils\FlashMessages;
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

    // Flash messages
    $environment->addFunction(new TwigFunction('has_flash', function (string $key) {
        return FlashMessages::has($key);
    }));
    $environment->addFunction(new TwigFunction('retrieve_flash', function (string $key) {
        return FlashMessages::retrieve($key);
    }));

    // Add twig to container
    $container->set('twig', $twig);
};