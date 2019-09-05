@extends('layouts.master') 
@section('transaksi','active')
@section('barangkeluar','active')
@section('content-header')
<h1>
        History
        <small>Pengambilang Barang</small>
      </h1> @endsection @section('content')
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">History Pengambilan Barang</h3>
    </div>
    <form action="#" method="get">
        <div class="row">
            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        <b>Nama :</b> {{$mahasiswa[0]['mahasiswa']['nama']}}
                        <br>
                        <b>Fakultas: </b> {{$mahasiswa[0]['mahasiswa']['fakultas']}}
                        <br>
                        <b>Niu: </b> {{$mahasiswa[0]['niu']}}
                        <br>
                        <!-- /.input group -->
                        <!-- {{csrf_field()}} -->
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
                    <th>Jumlah Keluar</th>
                    <th>Tanggal Pengambilan</th>
                </tr>
            </thead>
            <tbody>
                <?php  $no=1;
                ?>
                    @forelse($history as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data['barang']['nama_barang']}}</td>
                        <td>{{$data['ukuran_barang']['ukuran_barang']}}</td>
                        <td>{{$data['jml_keluar']}}</td>
                        <td>{{ $data->created_at->format('d-m-y H:i:s') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="7">Tidak ada History</td>
                    </tr>
                    @endforelse
                    </tfoot>
        </table>
    </div>
    </form>
</div>
</div>
</div>
</div>

@endsection 
