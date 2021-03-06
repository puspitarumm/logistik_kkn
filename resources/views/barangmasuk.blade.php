@extends('layouts.master')

@section('transaksi','active')
@section('barangmasuk','active')
@section('content')
@include('layouts.notification')
    <!-- Main content -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Barang Masuk</h3>
              <a class="pull-right btn btn-default" href="{{ url('/barangmasuk/tambah') }}">Tambahkan Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Masuk</th>
                  <th>Nama Barang</th>
                  <th>Ukuran Barang</th>
                  <th>Jumlah Masuk</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php  $no=1;
                ?>
                @foreach($barang_masuk as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{ $data->created_at->format('d-m-y H:i:s') }}</td>
                  <td>{{$data['barang']['nama_barang']}}</td>
                  <td>{{$data['ukuran_barang']['ukuran_barang']}}</td>
                  <td>{{$data->jml_masuk}}</td>
                  <td><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$data->id_brg_masuk}}">
                    <i class="glyphicon glyphicon-pencil"></i></button>
				          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$data->id_brg_masuk}}">
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
     
    
      <div class="modal fade" id="modal-default" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Barang Masuk</h4>
              </div>
              <div class="modal-body">
              <form method="POST" action="{{Route('create_brg_msk')}}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Tanggal Masuk:</label>
					          <input type="date" class="form-control" name="tgl_masuk" placeholder="tanggal masuk" />
					        </div>
                  <div class="form-line">
					          <label for="name">Nama Barang:</label>
                    <td><select class='form-control' name='id_ukuran' required>
                      @foreach($barang as $item)
                      <option value="{{$item['id_barang']}}">{{$item['nama_barang']}}</option>
                      @endforeach
					        <td> </select>
                  </div>
                  <!-- <div class="form-line">
					          <label for="name">Ukuran Barang:</label>
                    <td><select class='form-control' name='id_ukuran' required>
                      @foreach($ukuran as $item)
                      <option value="{{$item['id_ukuran']}}">{{$item['ukuran_barang']}}</option>
                      @endforeach
					        <td></select>
					        </div> -->
                  <div class="form-line">
					          <label for="name">Jumlah Masuk:</label>
                    <input type="text" class="form-control" name="jumlah_masuk" placeholder="jumlah masuk"/>
					        </div>
                  
                </div>
                {{csrf_field()}}

                <!-- <p>One fine body&hellip;</p> -->
                </div>
              <div class="modal-footer">
                  <input type="hidden" name="_method" value="PUT">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
            </form>
          </div> 
        </div>
      </div>
      </div>
</div>

           @foreach($barang_masuk as $data)

          <div class="modal fade" id="modal-warning{{$data->id_brg_masuk}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Barang Masuk</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="{{ route('update_brg_msk', $data['id_brg_masuk']) }}">
				        <div class="form-group">
                <div class="form-line">
                  <label for="name">Nama Barang:</label>
                    <select class="form-control" name="id_barang" disabled="disabled">
                                
                                @foreach($barang as $item)
                                <option value="{{$item['id_barang']}}" @if ($item['nama_barang']==$data['barang']['nama_barang']) selected @endif>{{$item['nama_barang']}}</option>
                                @endforeach
                            </select>
					        </div>
                  
                  
                  <div class="form-line">
                    <label for="name">Ukuran Barang:</label>
                    <select class="form-control" name="id_ukuran" disabled="disabled">
                                
                                @foreach($ukuran as $item)
                                <option value="{{$item['id_ukuran']}}" @if ($item['ukuran_barang']==$data['ukuran_barang']['ukuran_barang']) selected @endif>{{$item['ukuran_barang']}}</option>
                                @endforeach
                            </select>
					        </div>

                  <div class="form-line">
					          <label for="name">Jumlah Masuk:</label>
                    <input type="text" class="form-control" name="jml_masuk" placeholder="jumlah masuk" value="{{$data->jml_masuk}}" required>
                    @if ($errors->has('jml_masuk')){!! '<span class="text-red">'.$errors->first('jml_masuk').'</span>' !!} @endif
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
        <!-- /.modal -->
@endforeach

@foreach($barang_masuk as $data)
             <div class="modal fade" id="modal-danger{{$data->id_brg_masuk}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						                        aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title">Peringatan</h4>
						        </div>
						        <form action="{{route('delete_brg_msk', $data->id_brg_masuk)}}" method="post">
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
