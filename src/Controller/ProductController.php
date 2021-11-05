<?php

namespace App\Controller;

use App\Model\Category;
use App\Model\Product;
use App\Model\Utils\Cart;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductController extends AbstractController
{
    public function getAllProducts(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $products = Product::getAll();
        $categories = Category::getAll();
        return $this->render($response, 'products/products.html.twig', [
            'products' => $products,
            'category' => $categories
        ]);
    }

    public function addProductToCart(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $product = Product::getProductById($args['id'])->id;
        if(isset($_SESSION['cart']) == NULL){
            $arr = array();
            array_push($arr, [$product, 1]);
            $_SESSION['cart'] = $arr;
        }else{
            if(Cart::checkIfInCart($product)){
                Cart::addProductQuantity($product);
            }else{
                array_push($_SESSION['cart'], [$product, 1]);
            }
        }

        return $response->withHeader('Location', '/products')->withStatus(200);
    }


    public function getProductsByCategory(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $products = Product::where('id_category', '=', $args['id'])->get();
        //$products = $cat->products();
        $categories = Category::getAll();
        return $this->render($response, 'products/products.html.twig', [
            'products' => $products,
            'category' => $categories,
            'category_active' => $args['id']
        ]);
    }


    public function addProductQuantityToCart(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        Cart::addProductQuantity($args['id']);
        return $response->withHeader('Location', '/cart')->withStatus(200);
    }

    public function removeProductQuantityToCart(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        Cart::removeProductQuantity($args['id']);
        return $response->withHeader('Location', '/cart')->withStatus(200);
    }
}