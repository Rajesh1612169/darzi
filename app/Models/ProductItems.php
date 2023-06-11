<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItems extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'sku', 'qty_in_stock', 'product_image', 'price'];

}
