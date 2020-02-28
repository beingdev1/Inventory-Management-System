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
<body onload="window.print();">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
       
          <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
       
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Inventory MS
            <small class="pull-right" id="date">Date: {{ $todayDate = date("Y-m-d")}} </small>
          </h2>
      
        <!-- /.col -->
      </div>
      
      <div>

  <table class="table table-striped info">
          <thead>
            <tr>
                <th>S.No</th>
              <th>Product name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total Sum</th>
             
            </tr>
          </thead>
          <tbody class="more tr">
           
              @foreach ($transprods as $key=>$transprod)
                  <tr>
                      <td> {{$key +1}}</td>
                  
                      <td>{{$transprod->name}}</td>
                      <td>{{$transprod->quantity}}</td>
                      <td>{{$transprod->price}}</td>
                      <td>{{$transprod->total_price}}</td>
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
      <div class="row no-print">
        <div class="col-xs-12">
          
         <a href="" > <button type="submit" class="btn btn-success pull-right"><i class="fa fa-print"></i> Submit Bill
          </button></a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-print"></i> Generate PDF
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
 <script type="text/javascript">
// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</script>
@endsection