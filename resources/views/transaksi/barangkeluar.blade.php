@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      
@endsection
@section('content')
@include('layouts.notification')
    <!-- Main content -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Barang Keluar</h3>
              <a class='pull-right btn btn-danger' href="{{url('transaksi/add')}}">Tambahkan Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>niu</th>
                  <th>Penanggung Jawab</th>
                  <th>Lokasi</th>
                  <th>Bukti Pengambilan</th>
                  <th>Bukti Penyerahan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($ambil as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item['mahasiswa']['niu']}}</td>
                        <td>{{$item['mahasiswa']['nama']}}</td>
                        <td>{{$item['mahasiswa']['kode_lokasi']}}</td>
                        <td>
                          <form action="{{url('print')}}" method="post">
                              @csrf
                              <input type="hidden" name="lokasi" value="{{$item['mahasiswa']['kode_lokasi']}}">
                              <input type="hidden" name="periode" value="{{$item['mahasiswa']['id_periode']}}">
                              <button class="btn btn-success" type="submit">unduh</button>
                          </form>
                        </td>
                        @if ($item['path'])
                        <td>
                          <button class="btn btn-warning" data-target="#modal-hp-unggah{{$item['id_ambil']}}" data-toggle="modal">Hapus Unggahan</button>
                        </td>
                        @else
                        <td>
                          <button class="btn btn-info" data-target="#modal-warning{{$item['id_ambil']}}" data-toggle="modal">unggah</button>
                        </td>
                        @endif
                        <td>
                            <div class="btn-group">
                              <a class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$item['id_ambil']}}">
                                <i class="glyphicon glyphicon-trash"></i></a>
                            </div>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->

            @foreach ($ambil as $item)
                <!-- modal -->
            <div class="modal fade" id="modal-warning{{$item['id_ambil']}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Unggah Bukti Penyerahan</h4>
                    </div>
                    <div class="modal-body">
                    <form action="{{url('unggah')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <div class="form-line">
                          <label for="name">Dokumen</label>
                          <input type="hidden" name="id" value="{{$item['id_ambil']}}">
                          <input type="file" class="form-control" name="dokumen">
                        </div>
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                  </div> 
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              </div>
            <!-- /modal -->

          <!-- modal hapus data -->
            <div class="modal fade" id="modal-danger{{$item['id_ambil']}}" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                  aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Peringatan</h4>
                  </div>
                      <div class="modal-body text-center">
                          <span class="fa fa-exclamation-triangle fa-2x" style="color: orange;"></span>
                    
                          <h5>Apakah anda yakin akan menghapus data ini?</h5>
                        
                      </div>
                      <div class="modal-footer">
                        <a href="{{url('hapus/'.$item['id_ambil'])}}" class="btn btn-danger waves-effect">HAPUS</a>
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">BATAL</button>
                      </div>         
                  </div>
              </div>
          </div>
          <!-- /modal hapus data -->

          <!-- modal hapus unggahan -->
          <div class="modal fade" id="modal-hp-unggah{{$item['id_ambil']}}" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                  aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Peringatan</h4>
                  </div>
                      <div class="modal-body text-center">
                          <span class="fa fa-exclamation-triangle fa-2x" style="color: orange;"></span>
                    
                          <h5>Apakah anda yakin akan menghapus unggahan ini?</h5>
                        
                      </div>
                      <div class="modal-footer">
                        <a href="{{url('hapus/unggahan/'.$item['id_ambil'])}}" class="btn btn-danger waves-effect">HAPUS</a>
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">BATAL</button>
                      </div>         
                  </div>
              </div>
          </div>
          <!-- /modal hapus unggahan -->
            @endforeach
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    
 
@endsection
@section('custom-script')
<!-- DataTables -->
<script src="{{asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        var DatatablesDataSourceHtml = {
        init: function() {
            $("#example1").DataTable({
                searching : true,
                lengthChange : true,
                paging : true,
                info : true,
                responsive: !0,
            })
        }
    };
    jQuery(document).ready(function() {
        DatatablesDataSourceHtml.init()
    });    
    </script>
  @endsection
