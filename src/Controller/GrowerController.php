<?php

namespace App\Controller;

use App\Model\Grower;
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

}