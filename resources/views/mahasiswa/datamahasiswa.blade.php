
@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      
@endsection
@section('data_master','active')
@section('data_master5','active')
@section('content')

	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Mahasiswa</h3>
			  
              <a class="pull-right btn btn-default" href="{{route('mahasiswa/tambah_mahasiswa')}}">Tambahkan Data</a>
			</div>

			@if ($message = Session::get('message'))
        	<div class="alert alert-success martop-sm">
            <p>{{ $message }}</p>
        	</div>
    		@endif
			<button style="button" class="btn btn-primary delete_all" data-url="{{ url('DeleteAll') }}">Delete All Selected</button>
		<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
			IMPORT EXCEL
		</button>

		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/mahasiswa/import_exl" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">

							@csrf

							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>


		
		<!-- <a href="/mahasiswa/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> -->
		<!-- <div class="box-body"> -->
		<form method="post">
		@csrf
	@method('DELETE')
	<button formaction="/deleteall" type="submit" class="btn btn-danger">Delete All Selected</button>
              <table id="example1" class="table table-bordered table-hover">
		
			<thead>
				<tr>
				<th><input type="checkbox" class="selectall"></th>
					<th>No</th>
					<th>niu</th>
					<th>nama</th>
					<th>fakultas</th>
					<th>lokasi</th>
					<th>kode_lokasi</th>
					<th>ukuran_kaos</th>
					<th>periode</th>
					<th>tahun</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			
				@foreach($mahasiswa as $s)
				<tr>
				<td><input type="checkbox" name="nius[]" class="selectbox" value="{{ $s->niu }}"></td>
					<td>{{ $loop->iteration }}</td>
					<td>{{$s->niu}}</td>
					<td>{{$s->nama}}</td>
					<td>{{$s->fakultas}}</td>
					<td>{{$s['lokasikkn']['kode_lokasi']}}</td>
					<td>{{$s['lokasikkn']['lokasi']}}</td>
					<!-- <td>{{$s['ukuran_barang']['ukuran_barang']}}</td> -->
					<td></td>
					<td></td>
					<td>
					<a href="{{ route('mahasiswa.edit', $s->niu) }}" class="btn btn-warning btn-xs">Edit</a>
					<!-- <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$s->niu}}">
                    <i class="glyphicon glyphicon-pencil"></i></button> -->
				          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$s->niu}}">
                  <i class="glyphicon glyphicon-trash"></i></button>
					<!-- <td>{{$s['periode']['nama_periode']}}</td>
					<td>{{$s['periode']['tahun']}}</td> -->
					</td>
				</tr>
				@endforeach
				
			</tbody>
		</table>
		</form>
	</div>
	</div>
	</div>

	@foreach($mahasiswa as $data)
             <div class="modal fade" id="modal-danger{{$data->niu}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						                        aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title">Peringatan</h4>
						        </div>
						        <form action="{{route('delete_mhs', $data->niu)}}" method="post">
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

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

@endsection
@section('custom-script')
<!-- DataTables -->
<script src="{{asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">
		$('.selectall').click(function(){
		$('.selectbox').prop('checked', $(this).prop('checked'));
		$('.selectall2').prop('checked', $(this).prop('checked'));
	})
	$('.selectall2').click(function(){
		$('.selectbox').prop('checked', $(this).prop('checked'));
		$('.selectall').prop('checked', $(this).prop('checked'));
	})
	$('.selectbox').change(function(){
		var total = $('.selectbox').length;
		var number = $('.selectbox:checked').length;
		if(total == number){
			$('.selectall').prop('checked', true);
			$('.selectall2').prop('checked', true);
		} else{
			$('.selectall').prop('checked', false);
			$('.selectall2').prop('checked', false);
		}
	})
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
