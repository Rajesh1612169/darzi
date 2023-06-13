<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSize extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "body_type",
        "height",
        "size",
        "type",
        "fit"
    ];
}
