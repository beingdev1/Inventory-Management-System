@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
  

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          

        
        <div class="box-body text-giant">
          <h1><p>Welcome to the Admin Panel!! </p></h1>
          
          <h3><p>Admin: <strong>{{ \Auth::user()->name }}</p></strong></h3>
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