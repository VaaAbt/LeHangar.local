<?php

namespace App\Controller;

use App\Model\Manager;
use App\Model\Order;
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

}