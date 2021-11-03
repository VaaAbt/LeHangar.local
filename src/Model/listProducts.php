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

}