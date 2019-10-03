@extends('layouts.master')
@section('content')
@section('transaksi','active')
@section('barangmasuk','active')
@include('layouts.notification')
  
  <!-- Main content -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Barang Masuk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box box-primary">
                  <!-- data penanggung jawab -->
                  <form action="{{url('barangmasuk/simpan')}}" method="POST">
                    @csrf
                    
                    <!-- data penanggung jawab -->
                    <!-- form start -->
                    <!-- data penanggung jawab -->
                    <div class="box-body">
                        
                        @foreach ($barang as $barang)
                             <!--Kaos-->
                        <div class="box box-default collapsed-box">
                            <div class="box-header with-border">
                                <div class="checkbox">
                                  <label data-toggle="collapse" data-target="{{'#collapse'.$barang['id_barang']}}">
                                        <input type="checkbox"/> 
                                        <h3 class="box-title">{{$barang['nama_barang']}}</h3>	
                                    </label>
                                </div>
                                @if ($barang['nama_barang']=='Kaos')
                                <div id="{{'collapse'.$barang['id_barang']}}" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                              <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-1 control-label">Jumlah</label>
                                                @foreach ($ukuran as $ukuran)
                                                @if ($ukuran['ukuran_barang']!='All')
                                                <div class="col-sm-1">
                                                    <input type="text" class="form-control" name="{{$barang['nama_barang'].$ukuran['ukuran_barang']}}" placeholder="{{$ukuran['ukuran_barang']}}">
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                            <!-- /.box-body -->
                                    </div>
                                </div>
                                @else
                                <div id="{{'collapse'.$barang['id_barang']}}" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                      <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-1 control-label">Jumlah</label>
                                            <div class="col-sm-1">
                                                <input type="text" class="form-control" name="{{$barang['nama_barang'].'All'}}" placeholder="All">
                                            </div>
                                      </div>
                                            <!-- /.box-body -->
                                    </div>
                                </div>  
                                @endif
                            </div>
                          </div>
                          <!--/Kaos-->
                        @endforeach
                    </div>
                    <!-- data penanggung jawab -->
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          <!-- /.box -->
        </form>
        </div>
        <!-- /.col -->
      </div>
    <!-- /Main content -->
@endsection

@section('custom-script')
    <script>
      $('.collapse').collapse()
    </script>
@endsection