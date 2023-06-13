<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewProduct extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','brand_id', 'product_name', 'short_description', 'long_description','sku','qty_in_stock','price'];

}
