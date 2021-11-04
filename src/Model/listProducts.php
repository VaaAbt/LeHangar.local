<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class listProducts extends Model
{
    /**
     * Set the corresponding table name
     *
     * @var string
     */
    protected $table = 'listproducts';

    /**
     * Disable default timestamps columns
     *
     * @var bool
     */
    public $timestamps = false;

    public function create($data){
        $listproduct = new listProducts();

        $listproduct->setAttribute('id_product', $data['id_product']);
        $listproduct->setAttribute('id_order', $data['id_order']);
        $listproduct->setAttribute('quantity', $data['quantity']);
        $listproduct->save();

        return $listproduct;
    }

}