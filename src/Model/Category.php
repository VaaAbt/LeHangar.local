<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Set the corresponding table name
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * Disable default timestamps columns
     *
     * @var bool
     */
    public $timestamps = false;
}