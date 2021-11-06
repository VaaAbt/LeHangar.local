<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'id_grower', 'id');
    }

    public static function getAll()
    {
        return Grower::all();
    }

    public static function getGrowerById($id)
    {
        return Grower::where('id', '=', $id)->first();
    }
}