@extends('cashier.layouts.app')

@section('headSection')
<style>
  #pid{
    padding: 5px;
    border-radius: 4px;
    width: 170px;
    
}
  }
#tprice{
border: none;
}
#price{
border: none;
}
#quantity{
  border:none;
}
.toprintuser{
  display: none;
}
@media print {
    .toprintuser {
       display : block;
    }
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
   

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
       @php 
$trans_no = time();
@endphp
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Inventory MS 
            <div class="toprintuser">#{{ $trans_no }}</div>
            <small class="pull-right" id="date"><strong>Date: </strong>{{ $todayDate = date("Y-m-d")}} </small>
          </h2>
      
        <!-- /.col -->
      </div>
      <div class="no-print">
        

          <input type="text"   id="pid" autofocus />
           
        
        
      
          <br>
          <br>
      </div>
      <div>
<form method="POST" action="{{ route('cashier.product.store') }}" id="productform">
{{ csrf_field() }}

<input type="hidden" value="{{$trans_no}}" name="trans_no">
  <table class="table table-striped info" id ="toprint">
          <thead>
            <tr>
              <th>Product name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total Sum</th>
              <th class="no-print">Action</th>
            </tr>
          </thead>
          <tbody class="more tr">
          </tbody>
        </table>
      </div>
        
            <table class="table table-striped info" >
               <tr>
                <th>Subtotal:</th>
                <td id="subtotal">Rs. 0</td>
              </tr>
             <tr class="toprintuser">
               <th>Billed By:</th>
              <td>{{\Auth::user()->name}}</td>
            </tr>
            </table>
        
           
      
           
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          
         <a href="" > <button type="submit" class="btn btn-success pull-right"  id="print"><i class="fa fa-print"></i> Submit Bill
          </button></a>
          
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
$('#productform').submit(function(e){
    window.print();
});
  $('#pid').on('change',function(){
    
    let id = $('#pid').val();

    if(id == null){
      alert('please enter the product!!')
    }

    $.get("/cashier/getinfo/"+id, function(data){
      console.log(data);
      if(Object.keys(data).length > 0){
        let max  =Number(data.quantity)-10;
        let html = "<tr><td><input type='hidden' name='product_id[]' value='"+data.id+"'>"+data.name+"</td><td><input type='number' max='"+max+"'  onkeyup='gettotalprice(this)' value='1' name='quantity[]' id='quantity'></td><td>Rs.<input type='number' name='price[]' id='price' value='"+data.price+"'></td><td >Rs.<input type ='number' value='"+data.price+"' id='tprice' name = 'tprice' readonly></td><td class='no-print'><i class='glyphicon glyphicon-trash remove1 '></i></td></tr>";
        $('.more.tr').append(html);
      grandtotal();
      }
      else{
        alert('Product not found');j
      }
  });
  $('#pid').focus();
  })
  function grandtotal(){
    var tsum = 0;
    $('input[name=tprice').each(function(){
      tsum += Number($(this).val())
    });
    $('#subtotal').html('Rs.'+tsum)

  }
  function gettotalprice(qty){

let q= $(qty).val();

let p= $(qty).closest('tr').find('#price').val();

let total = Number(p)*Number(q);
$(qty).closest('tr').find('#tprice').val(total);
grandtotal();
  }
  $(document).on('click','.remove1',function(){

  
   $(this).parent().parent().remove()
grandtotal();
  });


</script>

@endsection