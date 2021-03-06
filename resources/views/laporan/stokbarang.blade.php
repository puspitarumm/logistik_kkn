@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      
@endsection
@section('laporan','active')
@section('stok','active')
@section('content')

<!-- Main content -->
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Barang</h3>
              <a href="/laporan/stok_cetak_pdf" target="_blank" class="btn btn-default" id="print"><i class="fa fa-print"></i> Unduh PDF</a>
                
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
                  <th>Stok</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; 
                ?>
                    @foreach($detailsbarang as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data['barang']['nama_barang']}}</td>
                  <td>{{$data['ukuran_barang']['ukuran_barang']}}</td>
                  <td>{{$data['stok']}}</td>
                  
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
                <h4 class="modal-title">Add Barang</h4>
              </div>
              <div class="modal-body">
              <form method="POST" action="{{Route('create_details')}}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Nama Barang:</label>
					          <td><select class='form-control' name='id_barang' required>
                    <option value="">-- Select Barang --</option>
                      @foreach($barang as $item)
                      <option value="{{$item['id_barang']}}">{{$item['nama_barang']}}</option>
                      @endforeach
                      </select>
					        <td>
					        </div>

                  <div class="form-line">
					          <label for="name">Ukuran Barang:</label>
					          <td><select class='form-control' name='id_ukuran' required>
                    <option value="">-- Select Ukuran --</option>
                      @foreach($ukuran_barang as $item)
                      <option value="{{$item['id_ukuran']}}">{{$item['ukuran_barang']}}</option>
                      @endforeach
                      </select>
					        <td>
					        </div>

                  <div class="form-line">
					          <label for="name">Stok:</label>
                    <input type="text" class="form-control" name="stok" placeholder="stok">

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


           @foreach($detailsbarang as $data)

          <div class="modal fade" id="modal-warning{{$data->id_barang}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="{{ route('update_brg', $data['id_barang']) }}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Nama Barang:</label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="nama barang" value="{{$data['barang']['nama_barang']}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Stok:</label>
                    <input type="text" class="form-control" name="stok" placeholder="stok" value="{{$data->stok}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Ukuran Barang:</label>
                    <input type="text" class="form-control" name="ukuran_barang" placeholder="ukuran barang" value="{{$data['ukuran_barang']['ukuran_barang']}}">
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
        </div>
        <!-- /.modal -->
@endforeach

@foreach($detailsbarang as $data)
             <div class="modal fade" id="modal-danger{{$data->id_barang}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						                        aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title">Peringatan</h4>
						        </div>
						        <form action="{{route('delete_brg', $data->id_barang)}}" method="post">
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
  
  
