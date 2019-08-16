@extends('layouts.master')
@section('content-header')
      <h1>
        Tambah Barang Keluar
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
              <h3 class="box-title">Data Penanggung Jawab</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                  <form action="{{url('transaksi/create')}}" method="POST">
                    @csrf
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">NIU</label>
                          <input type="text" class="form-control" name="niu" placeholder="Masukkan NIU">
                        </div>
                      </div>
                      <!-- /.box-body -->
        
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Go</button>
                      </div>
                    </form>
                  </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    <!-- /Main content -->
@endsection