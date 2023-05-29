<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'ulid',
        'product_name',
        'description',
        'images',
        'product_stock',
        'price'
    ];

    protected $table = 'products';
}
