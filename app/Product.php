<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['name', 'url', 'subtitle', 'description', 'code', 'price', 'avatar', 'image', 'category_id'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function Order_Product()
    {
        return $this->hasMany('App\Order_Product', 'products_id', 'id');
    }

    public function Category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
