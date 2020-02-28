<?php

namespace App\Model\cashier;

use Illuminate\Database\Eloquent\Model;

class Transaction_Product extends Model
{
    protected $table = "transaction_products";
    protected $fillable = ['product_id', 'transaction_id', 'quantity', 'price', 'total_price'];
    public function getTransProduct()
    {
        return $this->belongsTo('\App\Model\cashier\product', 'product_id', 'id');
    }
}
