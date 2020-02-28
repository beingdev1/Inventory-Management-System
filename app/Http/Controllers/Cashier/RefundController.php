<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\cashier;
use App\Model\cashier\product;
use App\Model\cashier\Transaction;
use App\Model\cashier\Transaction_Product;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $cashiers = cashier::all();
        $transactions = Transaction::all();
        $transaction_products = Transaction_Product::all();

        return view('cashier.refund.refund', compact('transactions', 'cashiers', 'transaction_products'));
    }
    public function getInfo(Request $request)
    {
        $id = $request->tid;

        $pinfo = Transaction_Product::select('transaction_products.id', 'products.name', 'products.quantity', 'products.price', 'transaction_products.product_id', 'transaction_products.total_price', 'transaction_products.quantity as qty', 'transaction_products.transaction_id')
            ->leftjoin('products', 'products.id', 'transaction_products.product_id')
            ->leftjoin('transactions', 'transactions.id', '=', 'transaction_products.transaction_id')
            ->where('transactions.transaction_no', $id)->get();

        return view('cashier.refund.refund', compact('pinfo'));
    }
    public function remainingstock($id, $qty)
    {
        $totalqty = product::find($id);
        $remaing = $totalqty->quantity + $qty;
        return ['tqty' => $remaing];
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
    public function refundproduct($id, $qty, $trans)
    {
        $return_q = Transaction_Product::where('transaction_id', $trans)->where('product_id', $id)->first();
        $q1 = $return_q->quantity - $qty;

        $pro = product::find($id);
        $q2 = $pro->quantity + $qty;
        $pro->update(['quantity' => $q2]);
        $return_q->update(['quantity' => $q1, 'total_price' => ($pro->price) * $q1]);
        $return_q = Transaction_Product::where('transaction_id', $trans)->where('product_id', $id)->first();
        $q = $return_q->quantity; //quantity
        $tp =  $return_q->total_price; //totalprice
        return response()->json(['rem' => $q, 'tp' => $tp]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $refund = Transaction_Product::all();

        return redirect()->back();
        // $transactions = ['cashier_id'=>'1','transaction_no'=>time()];

        //$transactions= Transaction::create($transactions);
        //foreach ($request->product_id as $key=>$product) {
        //  $prices= $request->price[$key];
        //$quantity= $request->quantity[$key];
        //$total_price = $prices*$quantity;
        //$transaction_products =['transaction_id'=>$transactions->id,'product_id'=>$product,'quantity'=>$quantity,'price'=>$prices,'total_price'=>$total_price];
        //Transaction_Product::create($transaction_products);
        //}
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
