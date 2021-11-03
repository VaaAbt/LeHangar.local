<?php

namespace App\Model;

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

}