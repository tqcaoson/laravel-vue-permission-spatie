<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      
      <span class="brand-text font-weight-light ml-5">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <router-link to="/" class="nav-link active">
                      <i class="nav-icon fas fa-th"></i>
                      <p>Dashboard</p>
                    </router-link>
                  </li>
                 
                  
                  <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Manage User
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
        
                      <li class="nav-item">
                        <router-link  to ="/user" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>User</p>
                        </router-link>
                      </li>
                    
                      <li class="nav-item">
                        <router-link to="/role" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Role</p>
                        </router-link>
                      </li>
                     
                      
                     
                    </ul>
                  </li>
            
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Catgory
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <router-link  to ="/category" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </router-link>
              </li>
              @can('subCategory-list')
              <li class="nav-item">
                <router-link to="/subCategory" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </router-link>
              </li>
              @endcan
             
            </ul>
          </li>


          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Content
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <router-link  to ="/content" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Content</p>
                </router-link>
              </li>
             
            </ul>
          </li>



          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Website Configuration
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <router-link  to ="/configuration" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Configuration</p>
                </router-link>
              </li>
             
            </ul>
          </li>

          

            
          <li class="nav-item">
           
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
             <i class="nav-icon fas fa-th"></i>
              <p>
                {{ __('Logout') }}
            </p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
   
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">Dashboard v2</h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->