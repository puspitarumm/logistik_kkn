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
              <h3 class="box-title">Masuk</h3>
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
                  <th>Nama Barang</th>
                  <th>Ukuran Barang</th>
                  <th>Jumlah Masuk</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; 
                ?>
                    @foreach($masuk as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data['barang']['nama_barang']}}
                  <td>{{$data['ukuran_barang']['ukuran_barang']}}</td>
                  <td>{{$data['jml_keluar']}}</td>
                  <td>
                  <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$data->id_details}}">
                    <i class="glyphicon glyphicon-pencil"></i></button>
				          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$data->id_details}}">
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
                <h4 class="modal-title">Tambah Masuk</h4>
              </div>
              <div class="modal-body">
              <form method="POST" action="{{Route('create_details')}}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Nama Barang:</label>
					          <td><select class='form-control' name='id' required>
                    <option value="">-- Select Barang --</option>
                      @foreach($nama_barang as $item)
                      <option value="{{$item['nama_barang']}}">{{$item['nama_barang']}}</option>
                      @endforeach
                      </select>
					        <td>
					        </div>

                  <div class="form-line">
					          <label for="name">Ukuran Barang:</label>
					          <td><select class='form-control' name='id_ukuran' required>
                    <option value="">-- Select Ukuran --</option>
                      @foreach($ukuran_barang as $item)
                      <option value="{{$item['ukuran_barang']}}">{{$item['ukuran_barang']}}</option>
                      @endforeach
                      </select>
					        <td>
					        </div>

                  <div class="form-line">
					          <label for="name">Stok:</label>
                    <input type="text" class="form-control" name="jml_keluar" placeholder="jml_keluar" required>
                    @if ($errors->has('jml_keluar')){!! '<span class="text-red">'.$errors->first('jml_keluar').'</span>' !!} @endif
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
                ordering    : true,
                responsive: !0,
                
            })
        }
    };
    jQuery(document).ready(function() {
        DatatablesDataSourceHtml.init()
    });    
    </script>

@endsection