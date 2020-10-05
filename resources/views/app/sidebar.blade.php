<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('public\img\car_wash_logo.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Carlos De la Cruz</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Listados
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{action('ServicioController@listado')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Servicios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{action('PersonalController@listado')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Personal</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{action('ProductosController@listado')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Productos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{action('SocioController@listado')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Socios</p>
                </a>
              </li>
          </ul>
        </li>
     </ul>
     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="{{action('BuscadorController@index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Buscador
            </p>
          </a>
        </li>
     </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->