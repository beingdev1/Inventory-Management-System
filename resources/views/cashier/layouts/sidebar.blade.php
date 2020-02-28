<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/avatar.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ \Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <br>
      <ul class="sidebar-menu">
        <li class="header">Cashier Menu</li>
      
           <li class="active treeview">
             <a href="/cashier/home/">
            <i class="fa fa-fw fa-shopping-cart">
               
            </i> 
         <span>   Billing</span>  
           
          </a>
          <br>
          
          <a href="/cashier/refund/">
            <i class="fa fa-fw fa-shopping-cart"></i> <span> Refund</span>
           
          </a>
         
        </li>
      
         
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>