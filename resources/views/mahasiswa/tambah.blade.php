@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
@endsection
@include('layouts.notification')
@section('mahasiswa','active')
@section('content')
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('mahasiswa.store')}}" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="niu">NIU</label>
                  <input type="text" class="form-control" id="niu" placeholder="NIU">
                </div>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="nama" class="form-control" id="nama" placeholder="Nama">
                </div>
                <div class="form-group">
                  <label for="nama">Fakultas</label>
                  <input type="fakultas" class="form-control" id="fakultas" placeholder="Fakultas">
                </div>
                <div class="form-group">
                    <label>Kode Lokasi</label>
                    <select class="form-control select2" style="width: 100%;" name="id_lokasi">
                    @foreach($lokasi as $item)
                    <!-- <option selected="selected">Alabama</option> -->
                    <option value="{{$item['id_lokasi']}}">{{$item['kode_lokasi']}}</option>
                     @endforeach
                    </select>
              </div>
              <!-- <div class="form-group">
                    <label>Lokasi</label>
                    <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>2018-J001</option>
                    <option>2018-J002</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                    </select>
              </div> -->
              <div class="form-group">
                  <label>Ukuran Kaos</label>
                  <td><select class='form-control' name='id_ukuran' required>
                    <option value="">-- Select Ukuran --</option>
                      @foreach($ukuran_barang as $item)
                      <option value="{{$item['id_ukuran']}}">{{$item['ukuran_barang']}}</option>
                      @endforeach
                      </select>
					        <td>
                </div>
                <div class="form-group">
                  <label>Periode</label>
                  <select class="form-control" name="periode" required>
                    <option>Periode 1</option>
                    <option>Periode 2</option>
                    <option>Periode 3</option>
                    <option>Periode 4</option>
                    <option>Periode 5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tahun</label>
                  <td><select class='form-control' name='tahun' required>
                    @foreach($tahun as $key=>$value) 
                      <option value="{{$value['tahun']}}">{{$value['tahun']}}</option>
                      @endforeach
                    </select>
					        <td>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <input type="submit" value="Simpan Data">
                <!-- <input type="submit" class="btn btn-primary">Submit</button> -->
              </div>
            </form>
          </div>
          <!-- /.box -->
          </div>
          </div>
@endsection
@section('custom-script'){
    <script type="text/javascript">
    $(function () {
    $('.select2').select2()
});
</script>
@endsection

