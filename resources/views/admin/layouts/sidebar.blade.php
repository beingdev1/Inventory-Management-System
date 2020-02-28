<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/avatar5.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ ucfirst(\Auth::user()->name) }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     <br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Main Menu</li>
      
        <li class="treeview">
          <a href="{{ route('product.index') }}">
            <i class="fa fa-product-hunt"></i>
            <span>Product</span>
           
          </a>
         
        </li>
      
         
          <li class="treeview">
          <a href="{{ route('cashier.index') }}">
            <i class="fa fa-user"></i>
            <span>User</span>
           
          </a>
         
        </li>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('cashier.create') }}"><i class="fa fa-circle-o"></i> Add New Cashier</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Edit Cashier Details</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="{{route('stock.index')}}">
            <i class="fa fa-database"></i>
            <span>Stock</span>
            
          </a>
         
        </li>
        <li>
          <a href="{{ route('category.index') }}">
            <i class="fa fa-list-alt"></i> <span>Category</span>
           
          </a>
        </li>

        <li>
          <a href="{{ route('report.index') }}">
            <i class="fa-file"></i> <span>Reports</span>
           
          </a>
        </li>
        
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>