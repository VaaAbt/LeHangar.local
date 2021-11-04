<?php

namespace App\Controller;

use App\Model\Product;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CartController extends AbstractController
{
    public function getCartView(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $products = array();
        if(isset($_SESSION['cart'])){
            for ($i=0; $i < count($_SESSION['cart']); $i++) { 
                array_push($products, Product::getProductById($_SESSION['cart'][$i]));
            }
        }
        return $this->render($response, 'cart.html.twig', [
            'products' => $products
        ]);
    }
}