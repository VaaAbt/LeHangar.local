<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Set the corresponding table name
     *
     * @var string
     */
    protected $table = 'order';

    /**
     * Disable default timestamps columns
     *
     * @var bool
     */
    public $timestamps = false;

}