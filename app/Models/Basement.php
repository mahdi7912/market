<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basement extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'pro_id',
        'arrival',
        'count',
        'expire',
    ];
}
