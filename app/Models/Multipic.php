<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multipic extends Model
{
    protected $table = 'multipics';
    use HasFactory;
    protected $fillable = [
     'image'
    ];
}
