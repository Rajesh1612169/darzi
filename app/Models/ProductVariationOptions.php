<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariationOptions extends Model
{
    use HasFactory;
    protected $table = 'product_variation_options';

    protected $fillable = [
        "variation_id",
        "variation_option_name"
    ];
}
