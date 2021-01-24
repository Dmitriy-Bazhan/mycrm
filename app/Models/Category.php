<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    public function getLftName()
    {
        return '_lft';
    }

    public function getRgtName()
    {
        return '_rgt';
    }

    public function getParentIdName()
    {
        return 'parent_id';
    }

    public function setParentAttribute($value)
    {
        $this->setParentIdAttribute($value);
    }

    public function data()
    {
        return $this->hasMany('App\Models\CategoryData', 'category_id', 'id');
    }

    public function scopeWithData($query, $lang)
    {
        return $query->with(['data' => function ($query) use ($lang) {
            return $query->where('lang', $lang);
        }]);
    }

    public function characteristics()
    {
        return $this->hasMany('App\Models\CharacteristicGroup', 'category_id', 'id');
    }

    public function scopeWithDescendants($query, $lang){
        return $query->with(['descendants' => function($query) use ($lang){
            return $query->with(['data' => function($query) use ($lang){
                return $query->where('lang', $lang);
            }]);
        }]);
    }
}
