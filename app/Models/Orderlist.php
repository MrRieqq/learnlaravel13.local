<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderlist extends Model
{
    // belongsTo - обозначает "принадлежит одному" (много списков заказов -> один заказ)
    // Связь с моделью Order M:1
    public function order() {
        return $this->belongsTo(Order::class);
    }
    // belongsTo - обозначает "принадлежит одному" (много списков заказов -> один продукт)
    // Связь с моделью Product M:1
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
