@extends('layouts.master')
@section('users','active')
@section('content')
@include('layouts.notification')
@if(count($errors) > 0)
				      <div class="alert alert-danger">
					    @foreach ($errors->all() as $error)
					    {{ $error }} <br/>
					    @endforeach
				    </div>
	        	@endif
    <!-- Main content -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manajemen Pengguna</h3>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
              Tambahkan Data</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama </th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1
                ?>
                @foreach($users as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->username}}</td>
                  <td>{{$data->email}}</td>
                  <td>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$data->id}}">
                    <i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$data->id}}">
                    <i class="glyphicon glyphicon-remove"></i></button>
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
                <h4 class="modal-title">Tambah Users</h4>
              </div>
              <div class="modal-body">
              
              <form method="POST" action="{{Route('create_adm')}}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">nama:</label>
                    <input type="text" class="form-control" name="name" placeholder="nama" required>
					        </div>
                  <div class="form-line">
					          <label for="name"> username:</label>
					          <input type="text" class="form-control" name="username" placeholder="username" required>
                    <p class="text-danger">{{ $errors->first('file') }}</p>
					        </div>
                  <div class="form-line">
					          <label for="name">email:</label>
                    <input type="text" class="form-control" name="email" placeholder="email" required>
					        </div>
                  <div class="form-line">
					          <label for="name">password:</label>
                    <input type="password" class="form-control" name="password" placeholder="password" required>
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

@foreach($users as $data)

          <div class="modal fade" id="modal-warning{{$data->id}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah User</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="{{ route('update_adm', $data['id']) }}" required>
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Nama:</label>
                    <input type="text" class="form-control" name="name" placeholder="nama" value="{{$data->name}}" required>
					        </div>
                  <div class="form-line">
					          <label for="name">Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="nama periode" value="{{$data->username}}" required>
					        </div> 
                  <div class="form-line">
					          <label for="name">Email:</label>
                    <input type="text" class="form-control" name="email" placeholder="email" value="{{$data->email}}" required>
					        </div>
                  <div class="form-line">
					          <label for="name">Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="password" required>
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
        </div>
@endforeach

@foreach($users as $data)
             <div class="modal fade" id="modal-danger{{$data->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						                        aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title">Peringatan</h4>
						        </div>
						        <form action="{{route('delete_adm', $data->id)}}" method="post">
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
