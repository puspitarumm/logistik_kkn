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
              <h3 class="box-title">Manajemen Pengguna</h3>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
              Tambahkan Data</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Nama </th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1
                ?>
                @foreach($admin as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->username}}</td>
                  <td>{{$data->password}}</td>
                  <td>{{$data->nama}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->status}}</td>
                  <td>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$data->id_admin}}">
                    <i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$data->id_admin}}">
                    <i class="glyphicon glyphicon-remove"></i></button>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
              {!!$admin->render()!!}
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
                <h4 class="modal-title">Add Users</h4>
              </div>
              <div class="modal-body">
              <form method="POST" action="{{Route('create_adm')}}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name"> username:</label>
					          <input type="text" class="form-control" name="username" placeholder="username">
					        </div>
                  <div class="form-line">
					          <label for="name">password:</label>
                    <input type="text" class="form-control" name="password" placeholder="password">
					        </div>
                  <div class="form-line">
					          <label for="name">nama:</label>
                    <input type="text" class="form-control" name="nama" placeholder="nama">
					        </div>
                  <div class="form-line">
					          <label for="name">email:</label>
                    <input type="text" class="form-control" name="email" placeholder="email">
					        </div>
                  <div class="form-line">
					          <label for="name">Status:</label>
                    <input type="text" class="form-control" name="status" placeholder="status">
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

@foreach($admin as $data)

          <div class="modal fade" id="modal-warning{{$data->id_admin}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="{{ route('update_adm', $data['id_admin']) }}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="nama periode" value="{{$data->username}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Password:</label>
                    <input type="text" class="form-control" name="password" placeholder="password" value="{{$data->password}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Nama:</label>
                    <input type="text" class="form-control" name="nama" placeholder="nama" value="{{$data->nama}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Email:</label>
                    <input type="text" class="form-control" name="email" placeholder="email" value="{{$data->email}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Status:</label>
                    <input type="text" class="form-control" name="status" placeholder="status" value="{{$data->status}}">
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

@foreach($admin as $data)
             <div class="modal fade" id="modal-danger{{$data->id_admin}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						                        aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title">Peringatan</h4>
						        </div>
						        <form action="{{route('delete_adm', $data->id_admin)}}" method="post">
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