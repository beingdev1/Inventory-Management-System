<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\cashier\product;
use App\Model\cashier\category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        $categories= category::all();
        return view('admin.product.show', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('admin.product.product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'body'=>'required',
        ]);
        
        //use model
        $product = new product;
        
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity=$request->quantity;
        $product->body = $request->body;
        $product->category_id=$request->categories;
        $product->save();
 
     
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show all the products , we have to give id-go to index
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::where('id', $id)->first();
        $categories = category::all();
        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {// same as the store function
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'body'=>'required',
        ]);
        //use model
        $product = product::find($id);
       
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity= $request->quantity;
        $product->body = $request->body;
       
    
        
        $product->save();

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::where('id', $id)->delete();
        return redirect()-> back();
    }
}
