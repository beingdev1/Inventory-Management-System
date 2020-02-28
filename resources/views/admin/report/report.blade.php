@extends('admin.layouts.app')
@section('headSection')
 <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
 @endsection
 <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
@section('main-content')
<div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><b>Report</b></h3>
          <br>
          <br>
           
          <form method="GET" action="/admin/report">
            <div class="row ">
              <div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" name="date">
                </div>
                <!-- /.input group -->
              </div>
                <button type="submit">Submit</button>
              </div>
                   </form>
                </div>
              
                </div>
              
              
                
             
            
         

         
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                </thead>
                <tbody><!--//first make compact in controller-->
                  @foreach($reports as $key=>$report)
               <tr>
                 <th>Transacation #{{ $report->transaction_no }}</th>
                 <th>Cashier Name : {{  $report->cashiers->name}}</th>
               <th>Date: {{date('dS M y',strtotime($report->date))}} </th>
               </tr>

               <tr>
                  <th>S.No </th>
                 
                  <th>Product Name</th>                
                
                  <th>No of Quantity</th>
                  <th>Total Amount</th>
              
                 
                </tr>
                
                  @php
                  $tprod = \App\Helper\TaskHelper::getTransProduct($report->id);
                  $initialquantity=0;
                  $initialtotal=0;
                  @endphp
                 

                  
                     @foreach ($tprod as $k=>$tp)
                     <tr>
                         <td>{{ $k +1}}</td>
                <td>{{ $tp->getTransProduct->name }}</td>
                  <td>{{ $tp->quantity }}</td>
                    <td>{{ $tp->total_price }}</td>
                    @php
                      $initialquantity +=$tp->quantity;
                      $initialtotal +=$tp->total_price;
                    @endphp
                 </tr>    
                  @endforeach
                  <tr>
                    <th colspan="2"></th>
                 
                    <th>Total Quantity: {{ $initialquantity }}</th>
                    <th>Total Price: {{ $initialtotal }}</th>
                  </tr>
                
               
                 @endforeach
            
                <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.box-body -->
       
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footerSection')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
  <script>
   $('#reservation').daterangepicker();</script>
@endsection