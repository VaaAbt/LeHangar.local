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
        return $this->render($response, 'products/products.html.twig', [
            'products' => $growers
        ]);
    }

    public function getGrowerById(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $grower = Grower::getGrowerById($args['id']);
        $products = Product::getProductsById_Grower($grower->id,3);

        return $this->render($response, 'detailedGrower.html.twig', [
            'grower' => $grower,
            'products' => $products
        ]);
    }

}