<?php

namespace App\Controller;

use App\Model\Grower;
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

}