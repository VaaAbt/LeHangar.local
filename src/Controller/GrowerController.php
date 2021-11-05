<?php

namespace App\Controller;

use App\Model\Grower;
use App\Model\listProducts;
use App\Model\Order;
use App\Model\Product;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GrowerController extends AbstractController
{
    public function getAllGrowers(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $growers = Grower::getAll();
        return $this->render($response, 'grower/grower.html.twig', [
            'growers' => $growers
        ]);
    }

    public function getGrowerById(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $grower = Grower::getGrowerById($args['id']);
        $products = Product::getProductsById_Grower($grower->id, 3);

        return $this->render($response, 'grower/detailedGrower.html.twig', [
            'grower' => $grower,
            'products' => $products
        ]);
    }


    public function productsView(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $products = Product::getProductsById_Grower($args['id']);
        $id_prodsArray = [];
        foreach ($products as $prod) {
            $id_prodsArray[] = ($prod->id);
        }

        $listProds = []; $listIdOrder = [];
        $tmplistProdsOrder = listProducts::all();
        foreach($tmplistProdsOrder as $list){
            if(in_array($list->getAttribute('id_product'), $id_prodsArray)){
                $listProds[$list->getAttribute('id_order')][] = $list->getAttribute('id_product');
                if(!in_array($list->getAttribute('id_order'), $listIdOrder)){
                    $listIdOrder[] = $list->getAttribute('id_order');
                }
            }
        }

        $tmpOrders = Order::all();
        $orders = [];
        foreach($tmpOrders as $ord){
            if(in_array($ord->getAttribute('id'), $listIdOrder)){
                $order[] = $ord;
            }
        }

        return $this->render($response, 'account/grower.html.twig', [
            'products' => $products,
            'listProducts' => $listProds,
            'orders' => $orders
        ]);
    }

}