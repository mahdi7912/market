<?php

namespace App\Models;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_list extends Model
{
    use HasFactory;

    public $guarded = ['id'];



    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
