<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'id_category', 'id');
    }

    public static function getAll()
    {
        return Category::all();
    }

}