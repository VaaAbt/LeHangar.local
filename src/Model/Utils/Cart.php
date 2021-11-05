<?php

namespace App\Model\Utils;

use App\Model\Product;

class Cart
{
    public function getSumOfCart()
    {
        $total = 0;
        if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $product) {
                $prod = Product::getProductById($product[0]);
                $total += $prod->unit_price * $product[1];
            }
        }
        return $total;
    }

}