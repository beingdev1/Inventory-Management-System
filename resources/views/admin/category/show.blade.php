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
          <h3 class="box-title">Categories</h3>
            <!-- button-->
            <a class="col-lg-offset-5 btn btn-success" href="{{ route('category.create') }}"><span class="glyphicon glyphicon-plus"></span> Add New Category</a>


      
        </div>
        <div class="box-body">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Category Name</th>
                  
                  
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody><!--//first make compact in controller-->
                  @foreach ($categories as $category)
                   <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $category->name }}
                  </td>
                  
                  
                  <td><a href="{{ route('category.edit',$category->id) }}"><span class="glyphicon glyphicon-pencil" style="color:seagreen"></span></a></td>

                  <td>
                    <form id="delete-form-{{ $category->id }}"action="{{ route('category.destroy',$category->id) }}" style="display:none" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      </form>
                      <a href="" onclick="if(confirm('Are you sure? you wanna delete this??'))
                      {event.preventDefault();document.getElementById('delete-form-{{ $category->id }}').submit();}
                      else{ event.preventDefault();}"
                    <span class="glyphicon glyphicon-trash" style="color:red"></span>
                  
                  </td>
                </tr>    
                  @endforeach
               
               
                </tbody>
                <tfoot>
                  <tr>
                  <th>S.No</th>
                  <th>Category Name</th>
                  
                 
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
<script src={{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src={{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
@endsection