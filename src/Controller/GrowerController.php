<?php

namespace App\Controller;

use App\Model\Grower;
use App\Model\listProducts;
use App\Model\Utils\FlashMessages;
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

        $listProds = [];
        $tmplistProdsOrder = listProducts::all();
        foreach ($tmplistProdsOrder as $list) {
            if (in_array($list->getAttribute('id_product'), $id_prodsArray)) {
                $listProds[$list->getAttribute('id_order')][] = [Product::query()->where('id', $list->getAttribute('id_product'))->first(), $list->getAttribute('quantity')];
            }
        }

        $informations = Grower::getGrowerById($args['id']);

        return $this->render($response, 'account/grower.html.twig', [
            'products' => $products,
            'listProducts' => $listProds,
            'grower_infos' => $informations
        ]);
    }

    public function editProductsView(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $product = Product::getProductById($args['id_product']);
        return $this->render($response, 'account/productEdition.html.twig', [
            'product' => $product,
            'grower_id' => $args['id']
        ]);
    }

    public function saveEditOfProduct(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $product = Product::getProductById($args['id_product']);
        $data = $request->getParsedBody();

        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->unit_price = $data['price'];
        $product->image = $data['image'];

        $product->save();

        return $response->withHeader('Location', '/grower/myPage/' . $args['id'])->withStatus(302);

    }

    public function getCreateNewProductPage(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        return $this->render($response, 'account/newProduct.html.twig');
    }

    public function createNewProduct(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        Product::create($data);
        FlashMessages::set('success', 'Le produit a bien été créé.');
        return $response->withHeader('Location', '/grower/myPage/' . $args['id'])->withStatus(302);
    }

    public function deleteProduct(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $product = Product::getProductById($args['id_product']);
        $product->delete();
        FlashMessages::set('success', 'Le produit a bien été supprimé.');
        return $response->withHeader('Location', '/grower/myPage/' . $args['id'])->withStatus(302);
    }

    public function getGrowerEditView(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $grower = Grower::getGrowerById($args['id']);
        return $this->render($response, 'account/editGrower.html.twig', [
            'grower' => $grower
        ]);
    }

    public function editGrowerInformations(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $grower = Grower::getGrowerById($args['id']);
        $data = $request->getParsedBody();
        $grower->name = $data['grower_name'];
        $grower->location = $data['grower_adresse'];
        $grower->email = $data['grower_email'];
        $grower->save();
        FlashMessages::set('success', 'Votre compte a bien été modifié!');
        return $response->withHeader('Location', '/grower/myPage/' . $args['id'])->withStatus(302);
    }

}