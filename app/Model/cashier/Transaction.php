<?php

namespace App\Model\cashier;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = ['cashier_id', 'transaction_no', 'date'];
    public function cashiers()
    {
        return $this->belongsTo('\App\Model\User', 'cashier_id', 'id');
    }
}
