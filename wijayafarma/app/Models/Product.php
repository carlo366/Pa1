<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_deskripsi',
        'price',
        'product_category_name',
        'product_category_id',
        'tipe',
        'quantity',
        'product_img',
        'slug',
    ];
    public function orders()
{
    return $this->hasMany(Order::class);
}
}

