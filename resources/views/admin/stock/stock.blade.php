@extends('admin.layouts.app')
@section('headSection')
 <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
 @endsection

@section('main-content')
<div class="content-wrapper">
  

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Stocks</h3>



        </div>
        <div class="box-body">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product Name</th>                 
                  <th>Category</th>
                  <th>Quantity</th>
                </tr>
                </thead>
                <tbody><!--//first make compact in controller-->
                  @foreach ($products as $product)
                   <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $product->name }}  </td>
                  <td> {{ $product->category['name'] }}</td>
                
                  <td> {{ $product->quantity }}</td>
                  

                  <!-- need form for delete-->
   
                  @endforeach
              
               
                </tbody>
                <tfoot>
                  <tr>
                  <th>S.No</th>
                  <th>Product Name</th>
                  
                  <th>Category</th>
                  <th>Quantity</th>
                  
                 
                </tr>
                </tfoot>
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
@endsection