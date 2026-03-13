<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';

    protected $fillable = [
        'order_id',
        'product_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function createOrderProduct($order_id, $products_id){
        foreach ($products_id as $product) {
            self::create([
                'order_id' => $order_id,
                'product_id' => $product,
            ]);
        }
    }
}
