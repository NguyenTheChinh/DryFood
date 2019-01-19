<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    protected $table = "orders_products";
    protected $fillable = ['order_id', 'products_id', 'amounts'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function Order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }

    public function Product()
    {
        return $this->belongsTo('App\Product', 'products_id', 'id');
    }
}
