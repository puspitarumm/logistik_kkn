<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('./images/girl.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Arum Puspitasari</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PENGGUNA</li>
        <li>
          <a href="{{ url('/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/listbarang') }}"><i class="fa fa-circle-o"></i> List Barang</a></li>
            <li><a href="{{ url('/ukuranbarang') }}"><i class="fa fa-circle-o"></i> Ukuran Barang</a></li>
            <li><a href="{{ url('/detailsbarang') }}"><i class="fa fa-circle-o"></i> Data Barang</a></li>
            <!-- <li><a href="{{ url('/satuan') }}"><i class="fa fa-circle-o"></i> Satuan</a></li> -->
            <li><a href="{{ url('/mahasiswa') }}"><i class="fa fa-circle-o"></i> Data Mahasiswa</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/barangmasuk') }}"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
            <li><a href="{{ url('/barangkeluar') }}"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/laporan/stokbarang')}}"><i class="fa fa-circle-o"></i>Laporan Stok Barang</a></li>
            <li><a href="{{ url('/laporan/lap_brg_masuk')}}"><i class="fa fa-circle-o"></i>Laporan Barang Masuk</a></li>
            <li><a href="{{ url('/laporan/lap_brg_keluar')}}"><i class="fa fa-circle-o"></i>Laporan Barang Keluar</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ url('/users') }}">
            <i class="fa fa-calendar"></i> <span>Managemen Pengguna</span>
          </a>
        </li>
        <li>
        <a href="{{ url('/dokumen') }}">
            <i class="fa fa-calendar"></i> <span>Managemen Dokumen</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/periode') }}"><i class="fa fa-circle-o"></i> Periode KKN</a></li>
          </ul>
        </li>
        
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>