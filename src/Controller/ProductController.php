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
        if(isset($_SESSION['cart']) == NULL){
            $arr = array();
            array_push($arr, [Product::getProductById($args['id'])->id, 1]);
            $_SESSION['cart'] = $arr;
        }else{
            array_push($_SESSION['cart'], [Product::getProductById($args['id'])->id, 1]);
        }

        return $response->withHeader('Location', '/products')->withStatus(200);
    }

    public function addProductQuantityToCart(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        $arr = array();
        foreach ($_SESSION['cart'] as $product) {

            if($product[0] == $args['id']){
                $product[1] += 1;
            }
            
            array_push($arr, $product);
        }
        $_SESSION['cart'] = $arr;

        return $response->withHeader('Location', '/cart')->withStatus(200);
    }

    public function removeProductQuantityToCart(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $push = true;
        $arr = array();
        foreach ($_SESSION['cart'] as $product) {
            if($product[0] == $args['id'] && $product[1] > 1){
                $product[1] -= 1;
                $push = true;
            }elseif($product[0] == $args['id'] && $product[1] == 1){
                $push = false;
            }else{
                $push = true;
            }
            if($push){
                array_push($arr, $product);
            }
        }
        $_SESSION['cart'] = $arr;

        return $response->withHeader('Location', '/cart')->withStatus(200);
    }
}