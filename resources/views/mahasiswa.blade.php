<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      
@endsection
@section('data_master','active')
@section('data_master4','active')
@section('content')
@include('layouts.notification')
	 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Mahasiswa</h3>
              <a class="pull-right btn btn-default" href="{{route('mahasiswa/tambah_mahasiswa')}}">Tambahkan Data</a>
			</div>
		<button style="button" class="btn btn-primary delete_all" data-url="{{ url('deleteAll') }}">Delete All Selected</button>
		<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
			IMPORT EXCEL
		</button>

		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/mahasiswa/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Mahasiswa</h5>
						</div>
						<div class="modal-body">

							@csrf
							<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-warning"></i> Perhatian! &nbsp;
                    File Data Mahasiswa Hanya Tipe (.xls, .xlsx)
                </div>
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
								<p class="text-danger">{{ $errors->first('file') }}</p>
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


		
		<a href="/mahasiswa/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
		<div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
		
			<thead>
				<tr>
				<th width="50px"><input type="checkbox" id="master"></th>
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
			@if($mahasiswa->count())
				@foreach($mahasiswa as $s)
				<tr id="tr_{{$s->niu}}">
                    <td><input type="checkbox" class="sub_chk" data-id="{{$s->niu}}"></td>
					<td>{{ $loop->iteration }}</td>
					<td>{{$s->niu}}</td>
					<td>{{$s->nama}}</td>
					<td>{{$s->fakultas}}</td>
					<td>{{$s->lokasi }}</td>
					<td>{{$s->kode_lokasi}}</td>
					<td>{{$s['ukuran_barang']['ukuran_barang']}}</td>
					<td>{{$s['periode']['nama_periode']}}</td>
					<td>{{$s['periode']['tahun']}}</td>
					<td><a href="{{ route('mahasiswa.edit', $s->niu) }}" class="btn btn-warning btn-xs">Edit</a>
					<!-- <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$s->niu}}">
                    <i class="glyphicon glyphicon-pencil"></i></button> -->
                    
				  </td>
				</tr>
				
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
	</div>
	</div>


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
	 $(document).ready(function () {
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

			$('#master').on('click', function(e) {
			if($(this).is(':checked',true))  
			{
				$(".sub_chk").prop('checked', true);  
			} else {  
				$(".sub_chk").prop('checked',false);  
			}  
			});


			$('.delete_all').on('click', function(e) {


				var allVals = [];  
				$(".sub_chk:checked").each(function() {  
					allVals.push($(this).attr('data-id'));
				});  


				if(allVals.length <=0)  
				{  
					alert("Please select row.");  
				}  else {  


					var check = confirm("Are you sure you want to delete this row?");  
					if(check == true){  


						var join_selected_values = allVals.join(","); 


						$.ajax({
							url: $(this).data('url'),
							type: 'DELETE',
							headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
							data: 'ids='+join_selected_values,
							success: function (data) {
								if (data['success']) {
									$(".sub_chk:checked").each(function() {  
										$(this).parents("tr").remove();
									});
									alert(data['success']);
								} else if (data['error']) {
									alert(data['error']);
								} else {
									alert('Whoops Something went wrong!!');
								}
							},
							error: function (data) {
								alert(data.responseText);
							}
						});


					$.each(allVals, function( index, value ) {
						$('table tr').filter("[data-row-id='" + value + "']").remove();
					});
					}  
				}  
			});


			$('[data-toggle=confirmation]').confirmation({
				rootSelector: '[data-toggle=confirmation]',
				onConfirm: function (event, element) {
					element.trigger('confirm');
				}
			});


			$(document).on('confirm', function (e) {
				var ele = e.target;
				e.preventDefault();


				$.ajax({
					url: ele.href,
					type: 'DELETE',
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					success: function (data) {
						if (data['success']) {
							$("#" + data['tr']).slideUp("slow");
							alert(data['success']);
						} else if (data['error']) {
							alert(data['error']);
						} else {
							alert('Whoops Something went wrong!!');
						}
					},
					error: function (data) {
						alert(data.responseText);
					}
				});
				return false;
			});
				
				});
				</script>
  @endsection
