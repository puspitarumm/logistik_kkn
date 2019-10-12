@extends('layouts.master')
@section('content-header')

@endsection
@section('data_master','active')
@section('data_master4','active')

@section('content')
@include('layouts.notification')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ubah Data Mahasiswa</h3>
            </div>
            <div class="box-body">
                <div class="box box-primary">

<form action="{{ route('mahasiswa.update') }}" method="post">
    {{csrf_field()}}
    <div class="box-body">
    <div class="form-group {{ $errors->has('niu') ? 'has-error' : '' }}">
        <label for="title" class="control-label">NIU</label>
        <input type="text" class="form-control" name="niu" placeholder="NIU" value="{{ $mahasiswa->niu }}" readOnly="readOnly">
        @if ($errors->has('niu'))
            <span class="help-block">{{ $errors->first('niu') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
        <label for="title" class="control-label">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ $mahasiswa->nama }}" required>
        @if ($errors->has('nama'))
            <span class="help-block">{{ $errors->first('nama') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('fakultas') ? 'has-error' : '' }}">
        <label for="title" class="control-label">Fakultas</label>
        <input type="text" class="form-control" name="fakultas" placeholder="Fakultas" value="{{ $mahasiswa->fakultas }}" required>
        @if ($errors->has('fakultas'))
            <span class="help-block">{{ $errors->first('fakultas') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('lokasi') ? 'has-error' : '' }}">
        <label for="title" class="control-label">Lokasi</label>
        <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" value="{{ $mahasiswa->lokasi }}" required>
        @if ($errors->has('lokasi'))
            <span class="help-block">{{ $errors->first('lokasi') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('kode_lokasi') ? 'has-error' : '' }}">
        <label for="title" class="control-label">Kode Lokasi</label>
        <input type="text" class="form-control" name="kode_lokasi" placeholder="Kode Lokasi" value="{{ $mahasiswa->kode_lokasi }}" required>
        @if ($errors->has('kode_lokasi'))
            <span class="help-block">{{ $errors->first('kode_lokasi') }}</span>
        @endif
    </div>
    <div class="form-group">
                  <label>Ukuran Kaos</label>
                
                  <select class="form-control" name="id_ukuran" required>
                                @foreach($ukuran_barang as $item)
                                <option value="{{$item['id_ukuran']}}" @if ($item['ukuran_barang']==$mahasiswa['ukuran_barang']['ukuran_barang']) selected @endif>{{$item['ukuran_barang']}}</option>
                                @endforeach
                            </select>
					   
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
                                <option value="{{$item['nama_periode']}}" @if ($item['nama_periode']==$mahasiswa['periode']['nama_periode']) selected @endif>{{$item['nama_periode']}}</option>
                                @endforeach
                            </select>
					        <td>
                  </div>
                  

                  <div class="form-line">
					          <label for="tahun">Tahun</label>
                    <td>
                    <select class="form-control" name="tahun"required >
                                
                                @foreach($tahun as $item)
                                <option value="{{$item['tahun']}}" @if ($item['tahun']==$mahasiswa['periode']['tahun']) selected @endif>{{$item['tahun']}}</option>
                                @endforeach
                            </select>
					        <td>
                  </div>
                  </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan Perubahan</button>
       
    
    <div>
</form>
</div>
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