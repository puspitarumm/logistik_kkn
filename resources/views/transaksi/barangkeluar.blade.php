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
              <h3 class="box-title">Barang Keluar</h3>
              <a class='pull-right btn btn-danger' href="{{url('transaksi/add')}}">Tambahkan Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>niu</th>
                  <th>Penanggung Jawab</th>
                  <th>Lokasi</th>
                  <th>Bukti Pengambilan</th>
                  <th>Bukti Penyerahan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($ambil as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item['user']['niu']}}</td>
                        <td>{{$item['user']['nama']}}</td>
                        <td>{{$item['user']['kode_lokasi']}}</td>
                        <td>
                          <form action="{{url('print')}}" method="post">
                              @csrf
                              <input type="hidden" name="lokasi" value="{{$item['user']['kode_lokasi']}}">
                              <input type="hidden" name="periode" value="{{$item['user']['id_periode']}}">
                              <button class="btn btn-success" type="submit">unduh</button>
                          </form>
                        </td>
                        <td>
                          <button class="btn btn-info" data-target="#modal-warning{{$item['id_ambil']}}" data-toggle="modal">unggah</button>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                              </div>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->

            @foreach ($ambil as $item)
                <!-- modal -->
            <div class="modal fade" id="modal-warning{{$item['id_ambil']}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Unggah Bukti Penyerahan</h4>
                    </div>
                    <div class="modal-body">
                    <form action="{{url('unggah')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <div class="form-line">
                          <label for="name">Dokumen</label>
                          <input type="hidden" name="id" value="{{$item['id_ambil']}}">
                          <input type="file" class="form-control" name="dokumen">
                        </div>
                      </div>
                    <div class="modal-footer">
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
            <!-- /modal -->
            @endforeach
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    
 
@endsection