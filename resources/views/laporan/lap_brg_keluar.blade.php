@extends('layouts.master')
​
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      
@endsection
​
@section('content')
​
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Laporan Barang Keluar</h3>
        </div>
                <div class="row">
                    <!-- FORM UNTUK FILTER DATA -->
                    <div class="col-md-12">
                        
                            <form action="{{ route('laporan.lap_brg_keluar') }}" method="get">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Mulai Tanggal</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="start_date" 
                                                class="form-control {{ $errors->has('start_date') ? 'is-invalid':'' }}"
                                                id="start_date"
                                                value="{{ request()->get('start_date') }}"
                                                >
                                             </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="">Sampai Tanggal</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            <input type="text" name="end_date" 
                                                class="form-control {{ $errors->has('end_date') ? 'is-invalid':'' }}"
                                                id="end_date"
                                                value="{{ request()->get('end_date') }}">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm">Cari</button>
                                        </div>
                                    </div>
                    
                                </div>
                            </form>
​
                            
                    </div>
                    
                    <!-- FORM UNTUK MENAMPILKAN DATA TRANSAKSI -->
                    <div class="col-md-12">

                            <!-- TABLE UNTUK MENAMPILKAN DATA TRANSAKSI -->
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Ukuran Barang</th>
                                            <th>Jumlah Keluar</th>
                                            <th>Tgl Transaksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  $no=1;
                                        ?>
                                        <!-- LOOPING MENGGUNAKAN FORELSE, DIRECTIVE DI LARAVEL 5.6 -->
                                        @forelse ($barang_keluar as $row)
                                        
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{ $row->barang->nama_barang }}</td>
                                            <td>{{ $row->ukuran_barang->ukuran_barang }}</td>
                                            
                                            <td>{{ $row->jml_keluar }}</td>
                                            <td>{{ $row->created_at->format('Y-m-d H:i:s') }}</td>
                                            
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-center" colspan="7">Tidak ada data transaksi</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                           
                    </div>
                </div>
            </div>
            </div>
    
@endsection
​
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