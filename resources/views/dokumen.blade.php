@extends('layouts.master')
@section('content')
@section('document','active')
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
                  
                  <!-- <img src="{{ URL::to('/') }}/images/{{ $data->dokumen }}"/> -->

                  
                  <td>
                  <!-- <a href="{{ Storage::url($data->dokumen) }}" title="View file {{ $data->nama_dokumen }}">
                                                <i class="fa fa-eye"></i>
                                            </a> -->
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
                <h4 class="modal-title">Tambah Dokumen</h4>
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
              <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-warning"></i> Perhatian! &nbsp;
                    Format file dokumen hanya bertipe (jpg, jpeg, pdf, png)
                </div>
          
                <div class="form-group">
					        <div class="form-line">
					          <label for="name">Nama Dokumen:</label>
					          <input type="text" class="form-control" name="nama_dokumen" placeholder="nama dokumen" required>
					        </div>
                  <div class="form-line">
					          <label for="nama_periode">Nama Periode</label>
                    <td><select class='form-control' name='nama_periode' required>
                    @foreach($nama_periode as $key=>$value) 
                      <option value="{{$value['nama_periode']}}">{{$value['nama_periode']}}</option>
                      @endforeach
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
                    <input type="file" class="form-control" name="dokumen" required>        
                </div>
                </div>
              <div class="modal-footer">
                <input type="hidden" name="_method" value="POST">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
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
                <h4 class="modal-title">Ubah Dokumen</h4>
              </div>
              <div class="modal-body">
              @if(count($errors) > 0)
				      <div class="alert alert-danger">
					    @foreach ($errors->all() as $error)
					    {{ $error }} <br/>
					    @endforeach
				    </div>
            @endif
            <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-warning"></i> Perhatian! &nbsp;
                    Format file dokumen hanya bertipe (jpg, jpeg, pdf, png)
                </div>
              <form method="post" action="{{ route('update_doc', $data['id_dokumen']) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
              <!-- <form method="post" action="{{ route('update_doc', $data['id_dokumen']) }}"> -->
				        <div class="form-group">
					        <div class="form-line">
					          <label for="name">Nama Dokumen:</label>
                    <input type="text" class="form-control" name="nama_dokumen" placeholder="nama dokumen" value="{{$data->nama_dokumen}}" required>
					        </div>

                  <div class="form-line">
					          <label for="nama_periode">Periode</label>
                    <td>
                    <!-- <select class='form-control' name='tahun' required>
                    @foreach($tahun as $key=>$value) 
                      <option value="{{$value['tahun']}}">{{$value['tahun']}}</option>
                      @endforeach
                    </select> -->

                    <select class="form-control" name="nama_periode" required>
                                
                                @foreach($nama_periode as $item)
                                <option value="{{$item['nama_periode']}}" @if ($item['nama_periode']==$data['periode']['nama_periode']) selected @endif>{{$item['nama_periode']}}</option>
                                @endforeach
                            </select>
					        <td>
                  </div>

                  <div class="form-line">
					          <label for="tahun">Tahun</label>
                    <td>
                    <!-- <select class='form-control' name='tahun' required>
                    @foreach($tahun as $key=>$value) 
                      <option value="{{$value['tahun']}}">{{$value['tahun']}}</option>
                      @endforeach
                    </select> -->

                    <select class="form-control" name="tahun" required>
                                
                                @foreach($tahun as $item)
                                <option value="{{$item['tahun']}}" @if ($item['tahun']==$data['periode']['tahun']) selected @endif>{{$item['tahun']}}</option>
                                @endforeach
                            </select>
					        <td>
                  </div>
                  <div class="form-line">
					          <label for="name">Dokumen:</label>
                    <!-- <input type="file" class="form-control" name="dokumen" value="{{$data->dokumen}}">         -->
                    <input type="file" name="dokumen"/>
              <img src="{{ URL::to('/') }}/data_file/{{ $data->dokumen }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $data->dokumen }}" />
       </div>
                </div>
                
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
