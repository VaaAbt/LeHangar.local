<?php

namespace App\Controller;

use App\Model\Product;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductController extends AbstractController
{
    public function getAllProducts(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $products = Product::getAll();
        return $this->render($response, 'products.html.twig', [
            'products' => $products
        ]);
    }

    public function addProductToCart(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        if($_SESSION['cart'][$args['id']] == null){
            $_SESSION['cart'][$args['id']] = 1;
        } else {
            $_SESSION['cart'][$args['id']] += 1;
        }

        return $response->withHeader('Location', '/products')->withStatus(200);

    }
}