<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function data()
    {
        return $this->hasOne('App\Models\ProductData', 'product_id', 'id');
    }

    public function allData()
    {
        return $this->hasOne('App\Models\ProductData', 'product_id', 'id');
    }

    public function productCharacteristicValue()
    {
        return $this->hasMany('App\Models\ProductCharacteristicValue', 'product_id', 'id');
    }

    public function scopeWithdata($query)
    {
        return $query->with(['data' => function($query){
            return $query->where('lang', app()->getLocale());
        }]);
    }
}
