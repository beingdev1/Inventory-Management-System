@extends('admin.layouts.app')

@section('headSection')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('main-content')
<div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Product Info</h3>
            </div>
            <!--to show error warning -->
            @include('includes.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('product.store') }}" method="POST">
              {{ csrf_field() }}
              <div class="box-body">
                <!-- left-side-->

                <div class="col-lg-6">
                 <!--   <div class="row">
                   foreach ($products as $p)
                       // <div>{ !! DNS1D::getBarcodeHTML($P->barcode, 'C128A') !!}</div>
                     //  <h2> $p->name }}</h2> 
                    endforeach 
                  
                  </div>
                  -->
                  
                  <div class="form-group">
                    <label for="name">Product Name</label>
                       <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div>
                
                  <div class="form-group">
                    <label for="price">Price</label>
                   <input type="number" class="form-control" id="price" placeholder="Price" name="price">
                    </div>

                  </div>

              <!-- right side-->
                <div class="col-lg-6">

                  <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" class="form-control" id="quantity" placeholder="quantity" name="quantity">
                </div>
                

                 <div class="form-group">
                <label>Category</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories" id="category_id" data-placeholder="Select a Category">
                  @foreach ($categories as $category)
                      <option  value="{{ $category->id }}" >{{ $category->name }}</option>
                  @endforeach
                  
                 
                 
                </select>
              </div>
                   </div>                            
                  </div>
              
              <div class="box">
              <div class="box-header">
                 <h3 class="box-title">Product Description             
                 </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
               
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                <textarea class="textarea" placeholder="Place some text here" name="body" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </form>
            </div>
                   
          
 
  
            
             

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('product.index') }}"  class="btn btn-warning">Back</a>
              </div>

           
          </form>
          </div>
 
         
      </div>
    </section>
</div>

@endsection
@section('footerSection')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">

      $("#category_id").select2({
            placeholder: "Select a Category",
            allowClear: true
        });
</script>

@endsection