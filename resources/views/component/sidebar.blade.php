<aside class="main-sidebar sidebar-primary" style="background-color: #B0E0E6;">

  <!-- Brand Logo -->
  <a href="/" class="brand-link" style="background-color: #B0C4DE;">
    <!-- <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->

    <center>
      <span class="brand-text font-weight-black" style="color:#483D8B;"><b>Pencatatan Penjualan</b></span>
    </center>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    @if(session('level_user') == 'Toko')
    @php
    $id_usertoko = session('id_usertoko');
    $usertoko = DB::table('tb_usertoko')->where('id_usertoko',$id_usertoko)->leftjoin('tb_toko','tb_toko.id_toko','=','tb_usertoko.id_toko')->select('tb_toko.id_toko','tb_toko.nama_toko','tb_usertoko.foto_usertoko')->first();
    @endphp

    
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="align-items: center;">
      <div class="image" style="float: center;">
        <img src='{{ asset("dist/img->foto_usertoko") }}' class="img-circle elevation-8" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block" style="color: black;"><b>{{ session()->get('username') }}</b></a>
        <!-- <a href="#" class="d-block">{{ session()->get('level_user') }}</a> -->
        <span style="color:#483D8B ;">O</span>
        <span style="color: #FF4500 ;">Online</span>
      </div>
    </div>

   
    @endif

    @if(session('level_user') == 'Pimpinan')
    @php
    $id_usertoko = session('id_usertoko');
    $usertoko = DB::table('tb_usertoko')->where('id_usertoko',$id_usertoko)->leftjoin('tb_toko','tb_toko.id_toko','=','tb_usertoko.id_toko')->select('tb_toko.id_toko','tb_toko.nama_toko')->first();
    @endphp

    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="align-items: center;">
      <div class="image" style="float: center;">
        <img src="{{asset('backend/dist/img/avatar5.png')}}" class="img-circle elevation-8" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block" style="color: black;"><b>{{ session()->get('username') }}</b></a>
        <!-- <a href="#" class="d-block">{{ session()->get('level_user') }}</a> -->
        <span style="color:#483D8B ;">O</span>
        <span style="color: #FF4500 ;">Online</span>
      </div>
    </div>

   
    @endif

    @if(session('level_user') == 'Super Admin')
    @php
    $id_usertoko = session('id_usertoko');
    $usertoko = DB::table('tb_usertoko')->where('id_usertoko',$id_usertoko)->leftjoin('tb_toko','tb_toko.id_toko','=','tb_usertoko.id_toko')->select('tb_toko.id_toko','tb_toko.nama_toko')->first();
    @endphp

    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="align-items: center;">
      <div class="image" style="float: center;">
        <img src="{{asset('backend/dist/img/avatar5.png')}}" class="img-circle elevation-8" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block" style="color: black;"><b>{{ session()->get('username') }}</b></a>
        <!-- <a href="#" class="d-block">{{ session()->get('level_user') }}</a> -->
        <span style="color:#483D8B ;">O</span>
        <span style="color: #FF4500 ;">Online</span>
      </div>
    </div>

   
    @endif

    
    <!-- SidebarSearch Form
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="{{ route('home') }}" class="nav-link active" style="background-color: #483D8B;">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home

            </p>
          </a>
          <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul> -->
        </li>

        @if(session('level_user') == 'Super Admin')
        <li class="nav-item">
          <a href="#" class="nav-link " style="background-color: #20B2AA;">
            <i class="nav-icon fas fa-copy"></i>
            <p style="color: black;">
              Data Master
              <i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">6</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ route('data_toko') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;">Data Toko</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('data_user') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;">Data User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('data_user_toko') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;">Data Karyawan</p>
              </a>
            </li>
            
            
            <!-- <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar <small>+ Custom Area</small></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li> -->
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link " style="background-color: #48D1CC;">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p style="color: black;">
              Pencatatan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('catat_data_omset') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;">Omset Penjualan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('catat_biaya_pengeluaran') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;">Biaya Pengeluaran</p>
              </a>
            </li>
            <!-- <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li> -->
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link " style="background-color: #B0C4DE;">
            <i class="nav-icon fas fa-edit"></i>
            <p style="color: black;">
              Laporan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('laporan_data_omset') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;">Omset Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('laporan_biaya_keluar') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;">Biaya Pengeluaran</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link " style="background-color: #FAF0E6;">
            <i class="fas fa-cogs"></i></i>
            <p style="color: black;">
              &nbsp; &nbsp;Pengaturan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('profile')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;"> Profile</p>
              </a>
            </li>
            <!-- <li class="nav-item">
                <a href="{{ route('data_user') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color: black;"> Data User</p>
                </a>
              </li> -->
            <!-- <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li> -->
          </ul>
        </li>
        @elseif(session('level_user') == 'Toko')
        <li class="nav-item">
          <a href="#" class="nav-link " style="background-color: #48D1CC;">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p style="color: black;">
              Pencatatan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('catat_data_omset') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;">Omset Penjualan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('catat_biaya_pengeluaran') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;">Biaya Pengeluaran</p>
              </a>
            </li>
            <!-- <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li> -->
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link " style="background-color: #FAF0E6;">
            <i class="fas fa-cogs"></i></i>
            <p style="color: black;">
              &nbsp; &nbsp;Pengaturan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('profile')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;"> Profile</p>
              </a>
            </li>
          </ul>
        </li>
        @else(session('level_user') == 'Pimpinan')
        <li class="nav-item">
          <a href="#" class="nav-link " style="background-color: #B0C4DE;">
            <i class="nav-icon fas fa-edit"></i>
            <p style="color: black;">
              Laporan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('laporan_data_omset') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;">Omset Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('laporan_biaya_keluar') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;">Biaya Pengeluaran</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link " style="background-color: #FAF0E6;">
            <i class="fas fa-cogs"></i></i>
            <p style="color: black;">
              &nbsp; &nbsp;Pengaturan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('profile')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p style="color: black;"> Profile</p>
              </a>
            </li>
            <!-- <li class="nav-item">
                <a href="{{ route('data_user') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color: black;"> Data User</p>
                </a>
              </li> -->
            <!-- <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li> -->
          </ul>
        </li>
        @endif

        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link ">
            <i class="fas fa-sign-out-alt"></i>
            <p style="color: black;"> &nbsp; &nbsp; Keluar</p>
          </a>
        </li>
        <!-- <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li> -->
        <!-- <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>