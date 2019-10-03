@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      
@endsection
@section('pengaturan','active')
@section('periode','active')
@section('content')
@include('layouts.notification')
    <!-- Main content -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Periode</h3>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
              Tambahkan Data</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Periode</th>
                  <th>Tahun</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Berakhir</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1;
                ?> 
                @foreach($periode as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->nama_periode}}</td>
                  <td>{{$data->tahun}}</td>
                  <td>{{$data->date_mulai}}</td>
                  <td>{{$data->date_berakhir}}</td>
                  <td>
                  <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$data->id_periode}}">
                    <i class="glyphicon glyphicon-edit"></i></button>
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$data->id_periode}}">
                    <i class="glyphicon glyphicon-remove"></i></button>
                  <!-- <a class='btn btn-info btn-xs' titlw='Detail Periode' href='".base_url()."administrator/edit_album/$row[id_album]'><span class='glyphicon glyphicon-list'></span></a> -->
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
                <h4 class="modal-title">Tambah Periode</h4>
              </div>
              <div class="modal-body">
              @if(count($errors) > 0)
				      <div class="alert alert-danger">
					    @foreach ($errors->all() as $error)
					    {{ $error }} <br/>
					    @endforeach
				    </div>
	        	@endif
              <form method="POST" action="{{Route('create_per')}}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Nama Periode:</label>
					          <input type="text" class="form-control" name="nama_periode" placeholder="nama periode" required>
					        </div>
                  <div class="form-line">
					          <label for="name">Tahun:</label>
                    <input type="text" class="form-control" name="tahun" placeholder="tahun" required>
                   
					        </div>
                  <div class="form-group">
                    <label>Tanggal Mulai:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker3" name="tgl_mulai"placeholder="tanggal mulai" required>
                </div>
                <!-- /.input group -->
              </div>
                  
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker4" name="tgl_berakhir"placeholder="tanggal berakhir" required>
                </div>
                <!-- /.input group -->
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

      @foreach($periode as $data)
        @php
            $i=$loop->iteration;
        @endphp
          <div class="modal fade" id="modal-warning{{$data->id_periode}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Periode</h4>
              </div>
              <div class="modal-body">
              <!-- @if(count($errors) > 0)
				      <div class="alert alert-danger">
					    @foreach ($errors->all() as $error)
					    {{ $error }} <br/>
					    @endforeach
				    </div>
	        	@endif -->
              <form method="post" action="{{ route('update_per', $data['id_periode']) }}">
				        <div class="form-group">
					        <div class="form-line">
                    <label for="name">Nama Periode:</label>
                    <input type="text" class="form-control" name="nama_periode" placeholder="nama periode" value="{{$data->nama_periode}}" required>
					        </div>
                  <div class="form-line">
					          <label for="name">Tahun:</label>
                    <input type="text" class="form-control" name="tahun" placeholder="tahun" value="{{$data->tahun}}" required>
                  </div>
                  <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="tgl_mulai" value="{{old('date_mulai') ? old('date_mulai'): $data['date_mulai']}}" required >
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="tgl_berakhir" value="{{old('date_berakhir') ? old('tgl_berakhir'): $data['date_berakhir']}}" required >
                </div>
                <!-- /.input group -->
              </div>
                
                {{csrf_field()}}

                 
              <div class="modal-footer">
                  <input type="hidden" name="_method" value="PUT">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
              </form>
            </div> 
          </div>
        </div>
        </div>
        </div>
@endforeach

@foreach($periode as $data)
             <div class="modal fade" id="modal-danger{{$data->id_periode}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						                        aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title">Peringatan</h4>
						        </div>
						        <form action="{{route('delete_per', $data->id_periode)}}" method="post">
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
<script>
$('.datepicker').datepicker({
      autoclose: true,
      format:'dd MM yyyy'
    })
    $('#datepicker3').datepicker({
      autoclose: true,
      format:"dd MM yyyy"
    })
    $('#datepicker4').datepicker({
      autoclose: true,
      format:"dd MM yyyy"
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

</script>
@endsection