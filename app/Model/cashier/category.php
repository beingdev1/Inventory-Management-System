<?php

namespace App\Model\cashier;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function products()
    {
        return $this->hasMany('App\Model\cashier\product', 'category_id');
    }
}
