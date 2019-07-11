@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      
@endsection
@section('content')
    <!-- Main content -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Barang Keluar</h3>
              <a class='pull-right btn btn-danger' href="">Tambahkan Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Transaksi</th>
                  <th>Tanggal Keluar</th>
                  <th>ID Barang</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Keluar</th>
                  <th>Penanggungjawab</th>
                  <th>Bukti Pengambilan</th>
                  <th>Bukti Penyerahan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                  <center><a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_album/$row[id_album]'><span class='glyphicon glyphicon-edit'></span></a>
                        <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_album/$row[id_album]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                </center></td>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    
 
@endsection