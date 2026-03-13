<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'name',
        'price',
    ];

    public static function createProduct($request){
        return self::create([
            'name' => $request->name_product,
            'price' => $request->price_product,
        ]);
    }
}
