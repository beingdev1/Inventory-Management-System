@extends('cashier.layouts.app')
@section('headSection')
<style>
#tprice{
border: none;
}
#price{
border: none;
}
</style>
 <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
 @endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
       
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Inventory MS
            <small class="pull-right" id="date"><b>Date: </b>{{ $todayDate = date("Y-m-d")}} </small>
          </h2>
      
        <!-- /.col -->
      </div>
      <div>
          <form action="/refund/">
        <input type="text" name="tid"autofocus>
          <button type="submit">Find</button>
          </form>
          <br>
      </div>
      <div>
<form method="POST" action="{{ route('refund.store') }}">
{{ csrf_field() }}
  <table class="table table-bordered" >
          <thead>
            <tr>
              <th>Product name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total Sum</th>
              <th>Remaining</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="more tr">
              @foreach($pinfo as $pi)
              <tr>
              <td><input type='hidden' name='product_id[]' value='{{ $pi->product_id }}' id="tpid">{{ $pi->name }}</td>
              <td><input type='number' min='0' oninput="validity.valid||(value='');" onkeyup='gettotalprice(this)' value='{{ $pi->qty }}' name='quantity[]' id ="tqty" ></td>
              <td>Rs.<input type='number' name='price[]'id='price' value="{{ $pi->price }}"  readonly>
            <td >Rs.<input type ='number' value='{{ $pi->total_price }}' id='tprice' name = 'tprice' readonly>
                <td id="remaining"></td>
                <td class="refund "><span class="glyphicon glyphicon-retweet"></span></td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
          <div>
            <table class="table-responsive">
               <tr>
                <th style="width:50%">Subtotal:</th>
                <td id="subtotal">Rs. 0</td>
              </tr>
            </table>
          </div>
      <!-- this row will not appear when printing -->
      <br>
      <div class="row no-print">
        <div class="col-xs-12">
          <button   class="btn btn-default" id="print"><i class="fa fa-print" ></i> Print</button>
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Refund Bill
          </button>
          </button>
        </div>
      </div>
    </section>
</form>
      

          
       
          
          
     
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
<!-- jQuery 2.2.3 -->
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script>

  $('#getinfo').on('change',function(){
    alert("D");
    let id = $('#pid').val();
    $.get("/cashier/getinfo/"+id, function(data){
        console.log(data);
      if(Object.keys(data).length > 0){
        let html = "<tr><td><input type='hidden' name='product_id[]' value='"+data.id+"'>"+data.name+"</td><td><input type='number' onkeyup='gettotalprice(this)' value='1' name='quantity[]'></td><td id='price'>Rs.<input type='number' name='price[]'id='price' value='"+data.price+"'></td><td >Rs.<input type ='number' value='"+data.price+"' id='tprice' name = 'tprice' readonly></td><td><i class='glyphicon glyphicon-trash remove1'></i></td></tr>";
        $('.more.tr').append(html);
      grandtotal();
      }
      else{
        alert('Product not found');j
      }
  });
  })
  function grandtotal(){
    var tsum = 0;
    $('input[name=tprice').each(function(){
      tsum += Number($(this).val())
let id = $(this).closest('tr').find('#tpid').val();

let q= $(this).closest('tr').find('#tqty').val();
$.get("/refundrem/"+id + '/'+ q, function(data){
    console.log(data);
$(this).closest('tr').find('#remaining').html('<b>'+data.tqty+'</b>');
});
    });
    $('#subtotal').html('Rs.'+tsum)

  }
  $(document).ready(function(){
      grandtotal();
      

  })
  function gettotalprice(qty){
let q= $(qty).val();
let p= $(qty).closest('tr').find('#price').val();
let total = Number(p)*Number(q);
$(qty).closest('tr').find('#tprice').val(total);
let id = $(qty).closest('tr').find('#tpid').val();
$.get("/refundrem/"+id + '/'+ q, function(data){
$(qty).closest('tr').find('#remaining').html('<b>'+data.tqty+'</b>')
});
grandtotal();
  }
  $(document).on('click','.remove1',function(){

  
   $(this).parent().parent().remove()
grandtotal();
  });
  $('.refund').click(function(){

  let pid  =   $(this).closest('tr').find('#tpid').val();
  var qty =   $(this).closest('tr').find('#tqty').val();
  let trans = <?php if($pinfo[0]->transaction_id) echo $pinfo[0]->transaction_id; else echo 0 ; ?>;
  $.get("/refundproduct/"+pid  + '/'+ qty +'/'+trans , function(data){
  $(this).closest('tr').find('#tprice').val(data.tp);
  $(this).closest('tr').find('#tqty').val(data.rem);
});
  });
  $('#print').click(function(){

     window.print();
 
  });
</script>
@endsection