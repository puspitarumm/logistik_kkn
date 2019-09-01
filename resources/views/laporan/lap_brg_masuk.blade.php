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
          <h3 class="box-title">Laporan Barang Masuk</h3>
        </div>
        <form action="{{ route('laporan.lap_brg_masuk') }}" method="get">
        <div class="row">
            <div class="col-md-6">
            <div class="box-body">
            <div class="form-group">
                <label for="">Mulai Tanggal</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                        <input type="text" name="start_date" 
                        class="form-control {{ $errors->has('start_date') ? 'is-invalid':'' }}"
                        id="start_date"value="{{ request()->get('start_date') }}">
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
                <!-- /.input group -->
                <!-- {{csrf_field()}} -->
                <div class="modal-footer">
                  <div class="form-group">
                                            <button class="btn btn-primary btn-sm">Cari</button>
                  </div>
                 </div>
              </div>
              </div>
              <!-- /.form group -->
              </div>
              </div>
              </div>
             
              <div class="box">
              <div class="box-header">
            </div>
              <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Ukuran Barang</th>
                  <th>Jumlah Masuk</th>
                  <th>Tanggal Transaksi</th>
                </tr>
                </thead>
                <tbody>
                <?php  $no=1;
                ?>
                @forelse($barang_masuk as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data['barang']['nama_barang']}}</td>
                  <td>{{$data['ukuran_barang']['ukuran_barang']}}</td>
                  <td>{{$data->jml_masuk}}</td>
                  <td>{{ $data->created_at->format('d-m-y H:i:s') }}</td>
                </tr>
                @empty
                 <tr>
                   <td class="text-center" colspan="7">Tidak ada data transaksi</td>
                 </tr>
                  @endforelse
                </tfoot>
              </table>
            </div>
            </form>
            <form action="{{url('laporan/print')}}" method="post">
              {{csrf_field()}}
              <input type="hidden" name="start_date" value="{{ request()->get('start_date') }}">
              <input type="hidden" name="end_date"  value="{{ request()->get('end_date') }}">
              <button type="submit" class="btn btn-default" id="print"><i class="fa fa-print"></i>Print</button>
              <!-- <a href="/laporan/print" target="_blank" class="btn btn-default" id="print"><i class="fa fa-print"></i> Print</a> -->
              <!-- <a class='pull-right btn btn-danger' href="">Tambahkan Data</a> -->
            </form>
            </div>
          </div>
        </div>
      </div>
     
        
              
@endsection

@section('custom-script')
<script>
$('#start_date').datepicker({
      autoclose: true,
      format:'dd-mm-yyyy'
    })
    $('#end_date').datepicker({
      autoclose: true,
      format:"dd-mm-yyyy"
    })

</script>
@endsection