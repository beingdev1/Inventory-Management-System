<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\cashier\Transaction;
use App\Model\cashier\Transaction_Product;
use DateTime;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (\Request::has('date')) {
            $date = $request->date;
            $format = explode('-', $date);
            $date1 = new DateTime($format[0]);
            $date1 = $date1->format('Y-m-d');
            $date2 = new DateTime($format[1]);
            $date2 = $date2->format('Y-m-d');
            } else {
            $date1 = date('Y-m-d');
        $date2 = date('Y-m-d');
        }
        $reports = Transaction::select('id', 'transaction_no','date', 'cashier_id')->where('date','>=',$date1)->where('date','<=',$date2)->orderBy('date')->get();
        return view('admin.report.report', compact('reports'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
