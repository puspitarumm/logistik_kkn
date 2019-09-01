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
              <h3 class="box-title">Barang Masuk</h3>
              <a class="pull-right btn btn-default" href="{{ url('/barangmasuk/tambah_barangmasuk') }}">Tambahkan Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">

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
                  <td>{{$i++}}</td>
                  <td>{{$data['barang']['nama_barang']}}</td>
                  <td>{{$data['ukuran']['ukuran_barang']}}</td>
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
                <h4 class="modal-title">Edit</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="{{ route('update_brg_msk', $data['id_brg_masuk']) }}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Tanggal Masuk:</label>
                    <input type="date" class="form-control" name="tgl_masuk" placeholder="tanggal masuk" value="value="{{ Carbon\Carbon::parse($data->tgl_masuk)->format('m/d/Y') }}"">
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
					          <label for="name">Jumlah Masuk:</label>
                    <input type="text" class="form-control" name="jumlah_masuk" placeholder="jumlah masuk" value="{{$data->jumlah_masuk}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Ukuran Barang:</label>
                    <input type="text" class="form-control" name="ukuran_barang" placeholder="ukuran barang" value="{{$data->ukuran_barang}}">
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