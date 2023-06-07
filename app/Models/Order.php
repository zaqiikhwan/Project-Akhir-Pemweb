<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'quantity',
        'price',
        'qris_code',
        'status',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
