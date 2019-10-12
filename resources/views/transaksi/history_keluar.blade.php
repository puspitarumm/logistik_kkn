@extends('layouts.master') 
@section('transaksi','active')
@section('barangkeluar','active')
@section('content-header')
<h1>
        History
        <small>Pengambilang Barang</small>
      </h1> @endsection @section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">History Pengambilan Barang</h3>
    </div>
    <form action="#" method="get">
        <div class="row">
            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        <b>Nama :</b> {{$mahasiswa[0]['mahasiswa']['nama']}}
                        <br>
                        <b>Fakultas: </b> {{$mahasiswa[0]['mahasiswa']['fakultas']}}
                        <br>
                        <b>Niu: </b> {{$mahasiswa[0]['niu']}}
                        <br>
                        <b>Kode Lokasi: </b> {{$mahasiswa[0]['kode_lokasi']}}
                        <br>
                        <!-- /.input group -->
                        <!-- {{csrf_field()}} -->
                    </div>
                </div>
                <!-- /.form group -->
            </div>
        </div>
</div>

<div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengambilan</th>
                    <th>Nama Barang</th>
                    <th>Ukuran Barang</th>
                    <th>Jumlah Keluar</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php  $no=1;
                ?>
                    @forelse($history as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $data->created_at->format('d-m-y H:i:s') }}</td>
                        <td>{{$data['barang']['nama_barang']}}</td>
                        <td>{{$data['ukuran_barang']['ukuran_barang']}}</td>
                        <td>{{$data['jml_keluar']}}</td>
                        <td><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$data->id_brg_keluar}}">
                    <i class="glyphicon glyphicon-pencil"></i></button>
				          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$data->id_brg_keluar}}">
                  <i class="glyphicon glyphicon-trash"></i></button>
                  </td>
                        
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="7">Tidak ada History</td>
                    </tr>
                    @endforelse
                    </tfoot>
        </table>
    </div>
    </form>
</div>
</div>
</div>
</div>

@foreach($history as $data)

          <div class="modal fade" id="modal-warning{{$data->id_brg_keluar}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Barang Keluar</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="{{ route('update_brg_keluar') }}">
              <input type="hidden" name="id_brg_keluar" value="{{$data['id_brg_keluar']}}">
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
                  
                </div>
                  
                  <div class="form-line">
					          <label for="name">Jumlah Keluar:</label>
                    <input type="text" class="form-control" name="jml_keluar" placeholder="jumlah keluar" value="{{$data->jml_keluar}}" required>
                    @if ($errors->has('jml_keluar')){!! '<span class="text-red">'.$errors->first('jml_keluar').'</span>' !!} @endif
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

@foreach($history as $data)
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
