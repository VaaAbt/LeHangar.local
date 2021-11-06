<?php

namespace App\Controller;

use App\Model\listProducts;
use App\Model\Manager;
use App\Model\Order;
use App\Model\Product;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ManagerController extends AbstractController
{

    public function dashboardView(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $orders_pending = Order::getPending();
        $orders_send = Order::getSend();
        $orders_validate = Order::getValidate();

        return $this->render($response, 'account/manager.html.twig', [
            'nb_ordPend' => $orders_pending->count(),
            'nb_ordSend' => $orders_send->count(),
            'nb_ordVal' => $orders_validate->count()
        ]);
    }


    public function ordersView(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $orders_pending = []; $orders_sending = []; $orders_validate = [];

        $tmp_Pend = Order::getPending();
        $tmp_Send = Order::getSend();
        $tmp_Val = Order::getValidate();

        foreach($tmp_Pend as $pend){
            $orders_pending[$pend->getAttribute('id')][] = $pend;

            $list = listProducts::query()->where('id_order', $pend->getAttribute('id'))->get();
            foreach($list as $l){
                $orders_pending[$pend->getAttribute('id')][] = Product::getProductById($l->getAttribute('id_product'));
            }
        }

        foreach($tmp_Send as $send){
            $orders_sending[$send->getAttribute('id')][] = $send;

            $list = listProducts::query()->where('id_order', $send->getAttribute('id'))->get();
            foreach($list as $l){
                $orders_sending[$send->getAttribute('id')][] = Product::getProductById($l->getAttribute('id_product'));
            }
        }

        foreach($tmp_Val as $val){
            $orders_validate[$val->getAttribute('id')][] = $val;

            $list = listProducts::query()->where('id_order', $val->getAttribute('id'))->get();
            foreach($list as $l){
                $orders_validate[$val->getAttribute('id')][] = Product::getProductById($l->getAttribute('id_product'));
            }
        }

        return $this->render($response, 'account/manager_orders.html.twig', [
            'ordPend' => $orders_pending,
            'ordSend' => $orders_sending,
            'ordVal' => $orders_validate
        ]);

    }

}