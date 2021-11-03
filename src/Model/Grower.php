<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Grower extends Model
{
    /**
     * Set the corresponding table name
     *
     * @var string
     */
    protected $table = 'grower';

    /**
     * Disable default timestamps columns
     *
     * @var bool
     */
    public $timestamps = false;
}