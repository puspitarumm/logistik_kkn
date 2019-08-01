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
              <h3 class="box-title">Data Mahasiswa</h3>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
              Tambahkan Data</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Fakultas</th>
                  <th>Lokasi</th>
                  <th>Kode Lokasi</th>
                  <th>Ukuran Kaos</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1;
                ?>
                @foreach($datamahasiswa as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->nim}}</td>
                  <td>{{$data->nama}}</td>
                  <td>{{$data->fakultas}}</td>
                  <td>{{$data->lokasi}}</td>
                  <td>{{$data->kode_lokasi}}</td>
                  <td>{{$data->ukuran_kaos}}</td>
                  <td>
                  <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$data->nim}}">
                    <i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$data->nim}}">
                    <i class="glyphicon glyphicon-remove"></i></button>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
              {!!$datamahasiswa->render()!!}
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
                <h4 class="modal-title">Add Data Mahasiswa</h4>
              </div>
              <div class="modal-body">
              <form method="POST" action="{{Route('create_mhs')}}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">NIM:</label>
					          <input type="text" class="form-control" name="nim" placeholder="nim">
					        </div>
                  <div class="form-line">
					          <label for="name">Nama:</label>
                    <input type="text" class="form-control" name="nama" placeholder="nama">
					        </div>
                  <div class="form-line">
					          <label for="name">Fakultas:</label>
                    <input type="text" class="form-control" name="fakultas" placeholder="fakultas">
					        </div>
                  <div class="form-line">
					          <label for="name">Lokasi:</label>
                    <input type="text" class="form-control" name="lokasi" placeholder="lokasi">
					        </div>
                  <div class="form-line">
					          <label for="name">Kode Lokasi:</label>
                    <input type="text" class="form-control" name="kode_lokasi" placeholder="kode_lokasi">
					        </div>
                  <div class="form-line">
					          <label for="name">Ukuran Barang:</label>
                    <input type="text" class="form-control" name="ukuran_barang" placeholder="ukuran barang">
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

@foreach($datamahasiswa as $data)

          <div class="modal fade" id="modal-warning{{$data->nim}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="{{route('updated_mhs', $data['nim']) }}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">NIM:</label>
                    <input type="text" class="form-control" name="nim" placeholder="nim" value="{{$data->nim}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Nama:</label>
                    <input type="text" class="form-control" name="nama" placeholder="nama" value="{{$data->nama}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Fakultas:</label>
                    <input type="text" class="form-control" name="fakultas" placeholder="fakultas" value="{{$data->fakultas}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Lokasi:</label>
                    <input type="text" class="form-control" name="lokasi" placeholder="lokasi" value="{{$data->lokasi}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Kode Lokasi:</label>
                    <input type="text" class="form-control" name="kode_lokasi" placeholder="kode_lokasi" value="{{$data->kode_lokasi}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Ukuran Barang:</label>
                    <input type="text" class="form-control" name="ukuran_barang" placeholder="ukuran_barang" value="{{$data->ukuran_barang}}">
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

@foreach($datamahasiswa as $data)
             <div class="modal fade" id="modal-danger{{$data->nim}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						                        aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title">Peringatan</h4>
						        </div>
						        <form action="{{route('delete_mhs', $data->nim)}}" method="post">
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