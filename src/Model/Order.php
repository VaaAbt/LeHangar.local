<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function products(): HasMany
    {
        return $this->hasMany(listProducts::class, 'id_order', 'id');
    }

    public function create($data){
        $order = new Order();

        $order->setAttribute('customer_name', $data['customer_name']);
        $order->setAttribute('customer_email', $data['customer_email']);
        $order->setAttribute('customer_phone', $data['customer_phone']);
        $order->setAttribute('amount', $data['amount']);
        $order->setAttribute('status', $data['status']);
        $order->save();

        return $order;
    }

}