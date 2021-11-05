<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id', 'id_category');
    }

    public function grower(): BelongsTo
    {
        return $this->belongsTo(Grower::class, 'id', 'id_grower');
    }

    public static function getProductById($id){
        return Product::where('id', '=', $id)->first();
    }

    public static function getProductsById_Grower($grower){
        $products = Product::where("id_grower", "=", $grower)->orderBy('id', 'desc')->get();
        return $products;
    }

    public static function getAll()
    {
        return Product::all();
    }

    public static function getRandomProduct($amount)
    {
        $lastProduct = Product::orderBy('id', 'desc')->first();
        $min = 1;
        $max = $lastProduct->id;

        $products = array();

        for ($i=0; $i < $amount; $i++) { 
            $product_id = rand($min, $max);
            $item = Product::where('id', '=', $product_id)->first();
            array_push($products, $item);
        }

        return $products;
    }

    public static function getRandomProductSameCategory($category,$amount,$pid)
    {
        $lastProduct = Product::distinct()->where("id_category", "=", $category)->orderBy('id', 'desc')->first();
        $min = 1;
        $max = $lastProduct->id;

        $products = array();
        $used = array();
        array_push($used,$pid);

        for ($i=0; $i < $amount; $i++) { 
            do{
                $product_id = rand($min, $max);
            }while(in_array($product_id,$used));
            array_push($used,$product_id);
            $item = Product::distinct()->where('id', '=', $product_id)->first();
            array_push($products, $item);
        }

        return $products;
    }
}