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
          <h3 class="box-title"><b>Products</b></h3>

            <!-- button-->
            <a class="col-lg-offset-5 btn btn-success" href="{{ route('product.create') }}"><span class=" glyphicon glyphicon-plus"></span> Add New Product</a>


          
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
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Description</th>
                  <th>Barcode</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody><!--//first make compact in controller-->
                  @foreach ($products as $product)
                   <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $product->name }}  </td>
                  <td> {{ $product->category['name'] }}</td>
                  <td>{{  $product->price }}</td>
                  <td> {{ $product->quantity }}</td>
                  <td>{{ $product->body }}</td>
                 <td id="bcode">{!!DNS1D::getBarcodeHTML($product->id, 'C39')!!}</td>
                  <td><a href="{{ route('product.edit',$product->id) }}"<span class="glyphicon glyphicon-pencil " style="color:green"></span></a></td>

                  <!-- need form for delete-->

                  <td>
                    <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy',$product->id) }}" style="display: none" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="" 
                    onclick="if(confirm('Are you sure??u wanna delete this??'))
                    
                    {event.preventDefault();
                    
                    document.getElementById('delete-form-{{ $product->id }}')
                    
                    .submit();}
                    else{event.preventDefault();}"
                    <span class="glyphicon glyphicon-trash " style="color:red"></span></a></td>
              
                
                  </tr>  
                 
                  @endforeach
              
               
                </tbody>
                <tfoot>
                  <tr>
                  <th>S.No</th>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Description</th>
                 <th>Barcode</th>
                  <th>Edit</th>
                  <th>Delete</th>
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

<script>

$()=>function(){
  $.print("#bcode");
}
</script>