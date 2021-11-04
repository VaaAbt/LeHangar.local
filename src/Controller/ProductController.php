<?php

namespace App\Controller;

use App\Model\Category;
use App\Model\Product;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductController extends AbstractController
{
    public function getAllProducts(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $products = Product::getAll();
        $categories = Category::getAll();
        return $this->render($response, 'products.html.twig', [
            'products' => $products,
            'category' => $categories
        ]);
    }

    public function addProductToCart(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        if(isset($_SESSION['cart']) == NULL){
            $arr = array(Product::getProductById($args['id'])->id);
            $_SESSION['cart'] = $arr;
        }else{
            array_push($_SESSION['cart'], Product::getProductById($args['id'])->id);
        }

        return $response->withHeader('Location', '/products')->withStatus(200);
    }


    public function getProductsByCategory(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $products = Product::where('id_category', '=', $args['id'])->get();
        //$products = $cat->products();
        $categories = Category::getAll();
        return $this->render($response, 'products.html.twig', [
            'products' => $products,
            'category' => $categories,
            'category_active' => $args['id']
        ]);

    }
}