<?php

namespace App\Model;

use App\Model\Utils\Auth;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Set the corresponding table name
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * Disable default timestamps columns
     *
     * @var bool
     */
    public $timestamps = false;

    public static function create($data): Product
    {
        $product = new Product();

        $product->setAttribute('name', $data['product_name']);
        $product->setAttribute('description', $data['product_description']);
        $product->setAttribute('unit_price', $data['product_price']);
        $product->setAttribute('image', $data['product_image']);
        $product->setAttribute('id_category', $data['product_category']);
        $product->setAttribute('id_grower', Auth::getUserId());
        $product->save();

        return $product;
    }

    public static function getProductById($id)
    {
        return Product::where('id', '=', $id)->first();
    }

    public static function getProductsById_Grower($grower)
    {
        return Product::where("id_grower", "=", $grower)->orderBy('id', 'desc')->get();
    }

    public static function getAll()
    {
        return Product::all();
    }

    public static function getRandomProduct($amount): array
    {
        $lastProduct = Product::orderBy('id', 'desc')->first();
        $min = 1;
        $max = $lastProduct->id;

        $products = array();

        for ($i = 0; $i < $amount; $i++) {
            $product_id = rand($min, $max);
            $item = Product::where('id', '=', $product_id)->first();
            array_push($products, $item);
        }

        return $products;
    }

    public static function getRandomProductSameCategory($category, $amount, $pid): array
    {
        $lastProduct = Product::distinct()->where("id_category", "=", $category)->orderBy('id', 'desc')->first();
        $min = 1;
        $max = $lastProduct->id;

        $products = array();
        $used = array();
        array_push($used, $pid);

        for ($i = 0; $i < $amount; $i++) {
            do {
                $product_id = rand($min, $max);
            } while (in_array($product_id, $used));
            array_push($used, $product_id);
            $item = Product::distinct()->where('id', '=', $product_id)->first();
            array_push($products, $item);
        }

        return $products;
    }
}