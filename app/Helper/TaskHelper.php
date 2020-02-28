<?php

namespace App\Helper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;

class TaskHelper
{
    public static function  getTransProduct($id)
    {
        $tprod = \App\Model\cashier\Transaction_Product::where('transaction_id', $id)->orderBy('id')->get();
        return $tprod;
    }
}
