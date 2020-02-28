<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Model\admin\cashier;
use App\Model\cashier\product;
use App\Model\cashier\Transaction;
use App\Model\cashier\Transaction_Product;
use Flash;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $cashiers = cashier::all();
        $products = product::all();
        return view('cashier.product.index', compact('products', 'cashiers'));
    }
    public function getInfo($id)
    {
        $info = product::find($id);
        return response()->json($info);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transactions = ['cashier_id' => Auth::user()->id, 'transaction_no' => $request->trans_no, 'date' =>  date('Y-m-d')];

        $transactions = Transaction::create($transactions);
        foreach ($request->product_id as $key => $product) {
            $prices = $request->price[$key];
            $quantity = $request->quantity[$key];

            $total_price = $prices * $quantity;
            $transaction_products = ['transaction_id' => $transactions->id, 'product_id' => $product, 'quantity' => $quantity, 'price' => $prices, 'total_price' => $total_price];

            Transaction_Product::create($transaction_products);
            $pro =  product::find($product);
            $remainquantity = $pro->quantity - $quantity;
            $pro->update(['quantity' => $remainquantity]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
