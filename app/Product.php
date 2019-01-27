<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = "products";
    protected $fillable = ['name', 'url', 'subtitle', 'description', 'code', 'price', 'avatar', 'image', 'category_id'];
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
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
