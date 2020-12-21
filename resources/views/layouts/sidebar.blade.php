<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/kartu-keluarga') }}" class="nav-link @yield('kk')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kartu Keluarga</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/penduduk') }}" class="nav-link @yield('penduduk')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/penduduk/laporan') }}" class="nav-link @yield('laporan')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>