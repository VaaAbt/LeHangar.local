<?php

namespace App\Controller;

use App\Model\Product;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController extends AbstractController
{
    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $products = Product::getRandomProduct(8);
        return $this->render($response, 'home.html.twig', [
            'products' => $products
        ]);
    }
}