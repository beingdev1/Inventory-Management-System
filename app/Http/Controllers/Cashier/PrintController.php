<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\cashier;
use App\Model\cashier\product;
use App\Model\cashier\Transaction_Product;

class PrintController extends Controller
{
    public function index(Request $request)
    {


        $transprods  = Transaction_Product::select('transaction_products.id', 'products.name', 'products.quantity', 'products.price', 'transaction_products.product_id', 'transaction_products.total_price')
            ->leftjoin('products', 'products.id', 'transaction_products.product_id')->get();
        
        return view('cashier.product.productprint', compact('transprods'));
    }
}
