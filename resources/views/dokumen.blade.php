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
              <h3 class="box-title">Manajemen Dokumen</h3>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
              Tambahkan Data</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Dokumen</th>
                  <th>Nama Periode</th>
                  <th>Dokumen</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1;
                ?>
                @foreach($document as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->nama_dokumen}}</td>
                  <td>{{$data->nama_periode}}</td>
                  <td>{{$data->dokumen}}</td>
                  <td>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$data->id_dokumen}}">
                    <i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$data->id_dokumen}}">
                    <i class="glyphicon glyphicon-remove"></i></button>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
              {!!$document->render()!!}
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
                <h4 class="modal-title">Add Dokument</h4>
              </div>
              <div class="modal-body">
              <form method="POST" action="{{Route('create_doc')}}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Nama Dokumen:</label>
					          <input type="text" class="form-control" name="nama_dokumen" placeholder="nama dokumen">
					        </div>
                  <div class="form-line">
					          <label for="name">Nama Periode:</label>
                    <input type="text" class="form-control" name="nama_periode" placeholder="nama periode">
					        </div>
                  <div class="form-line">
					          <label for="name">Dokumen:</label>
                    <input type="text" class="form-control" name="dokumen" placeholder="dokumen">
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

@foreach($document as $data)

          <div class="modal fade" id="modal-warning{{$data->id_dokumen}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit</h4>
              </div>
              <div class="modal-body">
              <form method="post" action="{{ route('update_doc', $data['id_dokumen']) }}">
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Nama Dokumen:</label>
                    <input type="text" class="form-control" name="nama_dokumen" placeholder="nama dokumen" value="{{$data->nama_dokumen}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Nama Periode:</label>
                    <input type="text" class="form-control" name="nama_periode" placeholder="nama periode" value="{{$data->nama_periode}}">
					        </div>
                  <div class="form-line">
					          <label for="name">Dokumen:</label>
                    <input type="text" class="form-control" name="dokumen" placeholder="dokumen" value="{{$data->dokumen}}">
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

@foreach($document as $data)
             <div class="modal fade" id="modal-danger{{$data->id_dokumen}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						                        aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title">Peringatan</h4>
						        </div>
						        <form action="{{route('delete_doc', $data->id_dokumen)}}" method="post">
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