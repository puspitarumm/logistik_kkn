@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
@endsection
@section('data_master','active')
@section('data_master2','active')
@section('content')
@include('layouts.notification')
    <!-- Main content -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ukuran Barang</h3>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
              Tambahkan Data</button>
              <!-- <a class='pull-right btn btn-danger' href="">Tambahkan Data</a> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Ukuran Barang</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; 
                ?>
                    @foreach($ukuran_barang as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->ukuran_barang}}</td>
                  <td>
                  <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$data->id_ukuran}}">
                    <i class="glyphicon glyphicon-pencil"></i></button>
				          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$data->id_ukuran}}">
                  <i class="glyphicon glyphicon-trash"></i></button>
            </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
      
    
      <div class="modal fade" id="modal-default" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Ukuran Barang</h4>
              </div>
              <div class="modal-body">
              <form method="POST" action="{{Route('create_uk_barang')}}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Ukuran Barang:</label>
					          <input type="text" class="form-control" name="ukuran_barang" placeholder="ukuran barang" required/>
					        </div>
                </div>
                {{csrf_field()}}

                <!-- <p>One fine body&hellip;</p> -->
                </div>
              <div class="modal-footer">
                  <input type="hidden" name="_method" value="PUT">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            </form>
          </div> 
        </div>
      </div>
      </div>
      </div>


           @foreach($ukuran_barang as $data)

          <div class="modal fade" id="modal-warning{{$data->id_ukuran}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Ukuran Barang</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="{{ route('update_ukuran', $data['id_ukuran']) }}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Ukuran Barang:</label>
                    <input type="text" class="form-control" name="ukuran_barang" placeholder="ukuran barang" value="{{$data->ukuran_barang}}" required>
					        </div>
                </div>
                {{csrf_field()}}

                 
              <div class="modal-footer">
                  <input type="hidden" name="_method" value="PUT">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
              </form>
            </div> 
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        </div>
        </div>
        <!-- /.modal -->
@endforeach

@foreach($ukuran_barang as $data)
             <div class="modal fade" id="modal-danger{{$data->id_ukuran}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						                        aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title">Peringatan</h4>
						        </div>
						        <form action="{{route('delete_ukuran', $data->id_ukuran)}}" method="post">
						            <div class="modal-body text-center">
						                <span class="fa fa-exclamation-triangle fa-2x" style="color: orange;"></span>
						          
						                <h5>Apakah anda yakin akan menghapus data ini?</h5>
						              
						            </div>
						            <div class="modal-footer">
						                <button type="submit" class="btn btn-danger waves-effect">HAPUS</button>
						                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">BATAL</button>
						            	 {{csrf_field()}}
						            	 <input type="hidden" name="_method" value="DELETE">
						            </div>
						        </form>                       
                    </div>
                </div>
            </div>
           @endforeach

 
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