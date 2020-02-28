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
          <h3 class="box-title"><b>Users</b></h3>
          <!-- button-->
            <a class="col-lg-offset-5 btn btn-success" href="{{ route('cashier.create') }}"><span class="glyphicon glyphicon-plus"></span> Add New User</a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        
        <div class="box-body">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example1" class="table table-bordered table-striped">
                 
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Role</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach ($users as $user)
                  
                   <tr>
                    <td>{{$loop->index +1  }}</td>
                  <td>{{ $user->name }}
                  </td>
                  <td>{{  $user->email }}</td>
                  <td> {{ $user->password }}</td>
                 <td>{{ $user->getRole->name }}</td>
                  <td><a href="{{ route('cashier.edit',$user->id) }}"<span class="glyphicon glyphicon-pencil " style="color:green"></span></a></td>

                  <!-- need form for delete-->

                  <td>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('cashier.destroy',$user->id) }}" style="display: none" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="" 
                    onclick="if(confirm('Are you sure??u wanna delete this??'))
                    
                    {event.preventDefault();
                    
                    document.getElementById('delete-form-{{ $user->id }}')
                    
                    .submit();}
                    else{event.preventDefault();}"
                    <span class="glyphicon glyphicon-trash " style="color:red"></span></a></td>
                </tr>    
                  @endforeach
               
                
                </tbody>
                <tfoot>
                  <tr>
                  <th>S.No</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Role</th>
                 
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
             
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