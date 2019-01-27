<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $fillable = ['title', 'url', 'subtitle', 'image', 'content','url_type'];
    protected $guarded = ['id'];
}
