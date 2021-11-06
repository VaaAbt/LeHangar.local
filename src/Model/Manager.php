<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    /**
     * Set the corresponding table name
     *
     * @var string
     */
    protected $table = 'manager';

    /**
     * Disable default timestamps columns
     *
     * @var bool
     */
    public $timestamps = false;


}