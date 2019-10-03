<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!--Get your own code at fontawesome.com-->
</head>
<body>
@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      
@endsection
@section('home','active')
@section('content')
 <!-- Main content -->
 <section class="content">
 <!-- /.box-header -->
 
 
      <!-- Info boxes -->
      
      <div class="row">
      @foreach($detailsbarang as $data)
      @if ($data['barang']['nama_barang']=='Kaos')
        <div class="col-md-3 col-sm-6 col-xs-12"> 
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class='fas fa-tshirt'></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{$data['barang']['nama_barang']}} {{$data['ukuran_barang']['ukuran_barang']}}</span>
              <span class="info-box-number">{{$data['stok']}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        @elseif ($data['barang']['nama_barang']=='Topi')
        <div class="col-md-3 col-sm-6 col-xs-12"> 
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class='fas fa-hard-hat'></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{$data['barang']['nama_barang']}}</span>
              <span class="info-box-number">{{$data['stok']}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        @elseif ($data['barang']['id_barang']=='6')
        <div class="col-md-3 col-sm-6 col-xs-12"> 
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class='fa fa-book'></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{$data['barang']['nama_barang']}}</span>
              <span class="info-box-number">{{$data['stok']}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        @else
        <div class="col-md-3 col-sm-6 col-xs-12"> 
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class='fa fa-file'></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{$data['barang']['nama_barang']}}</span>
              <span class="info-box-number">{{$data['stok']}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        @endif
        @endforeach
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fas fa-cart-arrow-down"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Barang Keluar</span>
              <span class="info-box-number">{{$keluar}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fas fa-truck-loading"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Barang Masuk</span>
              <span class="info-box-number">{{$masuk}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="far fa-file-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dokumen</span>
              <span class="info-box-number">{{$dokumen}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </div>
      <!-- /.row -->
      <div class= "row">
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="box">
            <div class="box-body">
            <h4>Peringatan Barang Habis</h4>
              <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Ukuran Barang</th>
                  <th>Stok</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; 
                ?>
                    @foreach($stok as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->barang['nama_barang']}}</td>
                  <td>{{$data->ukuran_barang['ukuran_barang']}}</td>
                  <td>{{$data->stok}}</td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div> 
            
          </div>
          </div>
          <!-- <div class="container">
          {!! $chart->html() !!}
          </div>
         
        {!! Charts::scripts() !!}
        {!! $chart->script() !!}
        </div> -->
          
    
            
@endsection

</body>
</html>