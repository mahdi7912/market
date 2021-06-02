<?php

namespace App\Models;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    public $with = ['product'];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
