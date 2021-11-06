<?php

namespace App\Controller;

use App\Model\Product;
use App\Model\listProducts;
use App\Model\Order;
use App\Model\Utils\Cart;
use App\Model\Utils\FlashMessages;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CartController extends AbstractController
{
    public function getCartView(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $products = array();

        if (isset($_SESSION['cart'])) {
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                array_push($products, [Product::getProductById($_SESSION['cart'][$i]), $_SESSION['cart'][$i][1]]);
            }
        }
        return $this->render($response, 'cart/cart.html.twig', [
            'products' => $products,
            'total' => Cart::getSumOfCart()
        ]);
    }

    public function orderCart(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        $order = Order::create([
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_phone' => $data['customer_phone'],
            'amount' => Cart::getSumOfCart(),
            'status' => '0',
        ]);

        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $product) {
                $newCommand = listProducts::create([
                    'id_product' => $product[0],
                    'id_order' => $order->id,
                    'quantity' => $product[1]
                ]);
            }
        }

        unset($_SESSION['cart']);

        FlashMessages::set('success', 'Votre commande a bien été enregistrée !');
        return $response->withHeader('Location', '/')->withStatus(200);
    }
}