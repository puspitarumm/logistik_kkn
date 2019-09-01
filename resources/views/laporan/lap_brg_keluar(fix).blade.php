@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      
@endsection
@section('content')
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Laporan Barang Keluar</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="box-body">
              <div class="form-group">
                <label>Dari Tanggal:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="start_date">
                </div>
                <!-- /.input group -->
              </div>
                <label>Sampai Tanggal:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="end_date">
                </div>
                <!-- /.input group -->
                {{csrf_field()}}
                <div class="modal-footer">
                  <input type="hidden" name="_method" value="PUT">
                  <button type="submit" class="btn btn-primary">Cari</button>
              </div>
              </div>
              </div>
              <!-- /.form group -->
              </div>
              </div>
             
              <div class="box">
              <div class="box-header">
              
              <a href="/laporan/stok_cetak_pdf" target="_blank" class="btn btn-default" id="print"><i class="fa fa-print"></i> Print</a>
                
              <!-- <a class='pull-right btn btn-danger' href="">Tambahkan Data</a> -->
            </div>
              <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Ukuran Barang</th>
                  <th>Jumlah Keluar</th>
                </tr>
                </thead>
                <tbody>
                <?php  $no=1;
                ?>
                @foreach($barang_keluar as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data['barang']['nama_barang']}}</td>
                  <td>{{$data['ukuran_barang']['ukuran_barang']}}</td>
                  <td>{{$data->jml_keluar}}</td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
     
        
              
@endsection

@section('custom-script')
<script>
$('#start_date').datepicker({
      autoclose: true,
      format:'yyyy-mm-dd'
    })
    $('#end_date').datepicker({
      autoclose: true,
      format:'yyyy-mm-dd'
    })

</script>
@endsection