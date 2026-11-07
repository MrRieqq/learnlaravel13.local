<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // hasMany - обозначает "имеет много" (один продукт -> много позиций заказов)
    // Связь с моделью OrderList 1:M
    public function orderlists() {
        return $this->hasMany(OrderList::class);
    }
}
