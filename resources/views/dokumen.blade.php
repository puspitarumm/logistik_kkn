@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      
@endsection
@section('content')
@include('layouts.notification')
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
              <table id="example1" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Dokumen</th>
                  <th>Nama Periode</th>
                  <th>Tahun</th>
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
                  <td>{{$data['nama_dokumen']}}</td>
                  <td>{{$data['periode']['nama_periode']}}</td>
                  <td>{{$data['periode']['tahun']}}</td>
                  <!-- <td><a target='_BLANK' href="{{ Storage::url($data->dokumen) }}">{{$data['dokumen']}}</a></td> -->
                 <td><a target='_BLANK' href="{{ url('/data_file/'.$data->dokumen) }}">{{$data['dokumen']}}</a></td>
                  </td>

                  
                  <td>
                  <a href="{{ Storage::url($data->dokumen) }}" title="View file {{ $data->nama_dokumen }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-warning{{$data->id_dokumen}}">
                    <i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{$data->id_dokumen}}">
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
                <h4 class="modal-title">Add Dokument</h4>
              </div>
              @if(count($errors) > 0)
				      <div class="alert alert-danger">
					    @foreach ($errors->all() as $error)
					    {{ $error }} <br/>
					    @endforeach
				    </div>
	        	@endif
              <div class="modal-body">
              <form method="POST" action="{{url('dokumen/upload')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
          
                <div class="form-group">
					        <div class="form-line">
					          <label for="name">Nama Dokumen:</label>
					          <input type="text" class="form-control" name="nama_dokumen" placeholder="nama dokumen">
					        </div>
                  <div class="form-line">
					          <label for="name">Nama Periode:</label>
                    <td><select class='form-control' name='nama_periode' required>
                    <option value="">-- Select Periode --</option>
                    <option value="Periode 1">Periode 1</option>
                    <option value="Periode 2">Periode 2</option>
                    <option value="Periode 3">Periode 3</option>
                    <option value="Periode 4">Periode 4</option>
                    <option value="Periode 5">Periode 5</option>
                    </select>
					        <td>
                  </div>
                  <div class="form-line">
					          <label for="tahun">Tahun</label>
                    <td><select class='form-control' name='tahun' required>
                    @foreach($tahun as $key=>$value) 
                      <option value="{{$value['tahun']}}">{{$value['tahun']}}</option>
                      @endforeach
                    </select>
					        <td>
                  </div>
                  <div class="form-line">
					          <label for="name">Dokumen:</label>
                    <input type="file" class="form-control" name="dokumen">        
                </div>
                </div>
              <div class="modal-footer">
                <input type="hidden" name="_method" value="POST">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" value="Upload" class="btn btn-primary">
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
                    <td><select class='form-control' name='nama_periode' required>
                    <option value="">-- Select Periode --</option>
                    <option value="Periode 1">Periode 1</option>
                    <option value="Periode 2">Periode 2</option>
                    <option value="Periode 3">Periode 3</option>
                    <option value="Periode 4">Periode 4</option>
                    <option value="Periode 5">Periode 5</option>
                    </select>
					        <td>
                  </div>
                  <div class="form-line">
					          <label for="tahun">Tahun</label>
                    <td><select class='form-control' name='tahun' required>
                    @foreach($tahun as $key=>$value) 
                      <option value="{{$value['tahun']}}">{{$value['tahun']}}</option>
                      @endforeach
                    </select>
					        <td>
                  </div>
                  <div class="form-line">
					          <label for="name">Dokumen:</label>
                    <!-- <input type="file" class="form-control" name="dokumen" value="{{$data->dokumen}}">         -->
                    <input type="file" name="dokumen" />
              <img src="{{ url('/data_file/'.$data->dokumen) }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_dokumen" value="{{ $data->dokumen }}" />
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
