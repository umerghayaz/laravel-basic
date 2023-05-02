<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    use HasFactory;
    protected $fillable = [
        'brand_name',
        'brand_image',
    ];
}
