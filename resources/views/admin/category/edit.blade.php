@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Edit Category Info</h3>
            </div>
            <!--to show error warning -->
          @include('includes.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('category.update',$category->id) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
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
                    <label for="name">Category Name</label>
                       <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $category->name }}">
                    </div>
                                      
 
  
            
             

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
              </div>

           
          </form>
          </div>
          <div>
          
              
            
          </div>
      </div>
    </section>
</div>

@endsection