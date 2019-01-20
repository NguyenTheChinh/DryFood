<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ['code', 'customer_name', 'customer_email', 'customer_phone', 'customer_city', 'customer_district', 'customer_address', 'payment_method', 'price', 'notes','status'];
    protected $guarded = ['id'];
    public $timestamps = true;

    public function Order_Product()
    {
        return $this->hasMany('App\Order_Product', 'order_id', 'id');
    }
}
