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

    public static function getProductById($id){
        return Product::where('id', '=', $id)->first();
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

}