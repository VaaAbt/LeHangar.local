<?php

namespace App\Controller;

use App\Model\Product;
use App\Model\Grower;
use App\Model\Category;
use App\Model\Utils\Cart;
use App\Model\Utils\FlashMessages;
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

    public function getProductById(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $product = Product::getProductById($args['id']);
        $grower = Grower::getGrowerById($product->id_grower);
        $category = Category::getCategoryById($product->id_category);

        $products = Product::getRandomProductSameCategory(1,4);

        return $this->render($response, 'products/detailedProduct.html.twig', [
            'product' => $product,
            'grower' => $grower,
            'category' => $category,
            'products' => $products
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

        FlashMessages::set('added', 'Le produit a bien été ajouté à votre panier.');
        return $response->withHeader('Location', '/products')->withStatus(200);
    }

    // Je sais pas comment changer withheader en renvoyant a la page avant donc ca en attendant

    public function addDetailedProductToCart(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        
        Cart::addMultipleProductQuantity($args['id'],$data['quantity']);

        FlashMessages::set('added', 'Le produit a bien été ajouté à votre panier.');

        return $response->withHeader('Location', '/detailedProduct/' . $args['id'])->withStatus(200);
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

    public function removeProductFromCart(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        Cart::removeProduct($args['id']);
        return $response->withHeader('Location', '/cart')->withStatus(200);
    }
}