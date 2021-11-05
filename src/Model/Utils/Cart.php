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

    public function checkIfInCart($product_id){
        if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $product) {
                if($product[0] == $product_id){
                    return true;
                }
            }
        }
        return false;
    }

    public function addProductQuantity($product_id){

        $arr = array();
        foreach ($_SESSION['cart'] as $product) {

            if($product[0] == $product_id){
                $product[1] += 1;
            }
            
            array_push($arr, $product);
        }
        $_SESSION['cart'] = $arr;
        return true;
    }

    public function addMultipleProductQuantity($product_id, $quantity){

        $arr = array();
        
        if(Cart::checkIfInCart($product_id)){
            foreach ($_SESSION['cart'] as $product) {

                if($product[0] == $product_id){
                    $product[1] += $quantity;
                }
                
                array_push($arr, $product);
            }
            $_SESSION['cart'] = $arr;
        }else{
            if(isset($_SESSION['cart'])){
                array_push($_SESSION['cart'], [$product_id, $quantity]);
            }else{
                $_SESSION['cart'] = array();
                array_push($_SESSION['cart'], [$product_id, $quantity]);
            }
        }
        return true;
    }

    public function removeProductQuantity($product_id){
        $push = true;
        $arr = array();
        foreach ($_SESSION['cart'] as $product) {
            if($product[0] == $product_id && $product[1] > 1){
                $product[1] -= 1;
                $push = true;
            }elseif($product[0] == $product_id && $product[1] == 1){
                $push = false;
            }else{
                $push = true;
            }
            if($push){
                array_push($arr, $product);
            }
        }
        $_SESSION['cart'] = $arr;
    }

}