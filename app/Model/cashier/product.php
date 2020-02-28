<?php

namespace App\Model\cashier;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $fillable = ['quantity', 'name', 'price', 'barcode', 'posted_by', 'category_id', 'body'];
    public function category()
    {
        return $this->belongsTo('App\Model\cashier\category');
    }
    public function cashiers()
    {
        return $this->belongsToMany('App\Model\admin\cashier', 'orders');
    }
}
