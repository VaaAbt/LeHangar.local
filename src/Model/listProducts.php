<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class listProducts extends Model
{
    /**
     * Set the corresponding table name
     *
     * @var string
     */
    protected $table = 'listProducts';

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