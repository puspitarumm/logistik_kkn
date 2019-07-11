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
                  <th>Tanggal Keluar</th>
                  <th>ID Barang</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Keluar</th>
                  <th>Lokasi</th>
                  <th>Tahun</th>
                  <th>Bukti Pengambilan</th>
                  <th>Bukti Penyerahan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1;
                ?>
                @foreach($barang_keluar as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->tgl_keluar}} </td>
                  <td>{{$data->id_barang}}</td>
                  <td>{{$data->nama_barang}}</td>
                  <td>{{$data->jml_keluar}}</td>
                  <td>{{$data->lokasi}}</td>
                  <td>{{$data->tahun}}</td>
                  <td>{{$data->bukti_pengambilan}}</td>
                  <td>{{$data->bukti_penyerahan}}</td>
                  <td><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$data->id_brg_keluar}}">
                    <i class="glyphicon glyphicon-pencil"></i></button>
				          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$data->id_brg_keluar}}">
                  <i class="glyphicon glyphicon-trash"></i></button>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
              {!!$barang_keluar->render()!!}
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
                <h4 class="modal-title">Add Barang Keluar</h4>
              </div>
              <div class="modal-body">
              <form method="POST" action="{{Route('create_brg_keluar')}}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Tanggal Keluar:</label>
					          <input type="date" class="form-control" name="tgl_keluar" placeholder="tanggal keluar" />
					        </div>
                  <div class="form-line">
					          <label for="name">Id Barang:</label>
                    <input type="text" class="form-control" name="id_barang" placeholder="id barang"/>
					        </div>
                  <div class="form-line">
					          <label for="name">Nama Barang:</label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="nama barang"/>
					        </div>
                  <div class="form-line">
					          <label for="name">Jumlah Keluar:</label>
                    <input type="text" class="form-control" name="jumlah_keluar" placeholder="jumlah keluar"/>
					        </div>
                  <div class="form-line">
					          <label for="name">Ukuran Barang:</label>
                    <input type="text" class="form-control" name="ukuran_barang" placeholder="ukuran barang"/>
					        </div>
                  <div class="form-line">
					          <label for="name"> Periode:</label>
                    <input type="text" class="form-control" name="periode" placeholder="periode"/>
					        </div>
                  <div class="form-line">
					          <label for="name"> Tahun:</label>
                    <input type="text" class="form-control" name="tahun" placeholder="tahun"/>
					        </div>
                </div>
                {{csrf_field()}}

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

           @foreach($barang_keluar as $data)

          <div class="modal fade" id="modal-warning{{$data->id_brg_keluar}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="{{ route('update_brg_keluar', $data['id_brg_keluar']) }}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Tanggal Keluar:</label>
                    <input type="date" class="form-control" name="tgl_keluar" placeholder="tanggal keluar" value="{{$data->tgl_keluar}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Id Barang:</label>
                    <input type="text" class="form-control" name="id_barang" placeholder="id barang" value="{{$data->id_barang}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Nama Barang:</label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="nama barang" value="{{$data->nama_barang}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Jumlah Keluar:</label>
                    <input type="text" class="form-control" name="jumlah_keluar" placeholder="jumlah keluar" value="{{$data->jumlah_keluar}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Ukuran Barang:</label>
                    <input type="text" class="form-control" name="ukuran_barang" placeholder="ukuran barang" value="{{$data->ukuran_barang}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Lokasi:</label>
                    <input type="text" class="form-control" name="ukuran_barang" placeholder="ukuran barang" value="{{$data->ukuran_barang}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Tahun:</label>
                    <input type="text" class="form-control" name="tahun" placeholder="tahun" value="{{$data->tahun}}">
					        </div>
                </div>
                {{csrf_field()}}

                 
              <div class="modal-footer">
                  <input type="hidden" name="_method" value="PUT">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div> 
          </div>
        </div>
        </div>

@endforeach

@foreach($barang_keluar as $data)
             <div class="modal fade" id="modal-danger{{$data->id_brg_keluar}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						                        aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title">Peringatan</h4>
						        </div>
						        <form action="{{route('delete_brg_keluar', $data->id_brg_keluar)}}" method="post">
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