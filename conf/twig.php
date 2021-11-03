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

    // Add Twig session variable
    $environment = $twig->getEnvironment();
    $environment->addGlobal('auth', (object)[
        'isLoggedIn' => Auth::isLoggedIn(),
        'user' => Auth::getUser()
    ]);

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