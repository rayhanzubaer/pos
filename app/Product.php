<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'image',
        'code',
        'description',
        'category_id',
        'stock',
        'buying_price',
        'selling_price',
    ];
}
