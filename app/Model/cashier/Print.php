<?php

namespace App\Model\cashier;

use Illuminate\Database\Eloquent\Model;

class Print extends Model
{
    public function getTransProd()
    {
        return $this->belongsTo('App\Model\cashier\product', 'product_id', 'id');
    }
}
