@extends('layouts.master')
@section('content-header')

@endsection
@section('data_master','active')
@section('data_master4','active')

@section('content')
@if(count($errors) > 0)
				      <div class="alert alert-danger">
					    @foreach ($errors->all() as $error)
					    {{ $error }} <br/>
					    @endforeach
				    </div>
	        	@endif
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Mahasiswa</h3>
            </div>
            <div class="box-body">
                <div class="box box-primary">
                <form action="{{ route('mahasiswa.store') }}" method="post">
                {{csrf_field()}}
                <div class="box-body">
                    <div class="form-group">
                        <label for="title" class="control-label">NIU</label>
                        <input type="text" class="form-control" name="niu" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                       
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label">Fakultas</label>
                        <input type="text" class="form-control" name="fakultas" placeholder="Fakultas" required>
                      
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label">Lokasi</label>
                        <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" required>
                       
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label">Kode Lokasi</label>
                        <input type="text" class="form-control" name="kode_lokasi" placeholder="Kode Lokasi" required>
                       
                    </div>
                  
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
                                <div class="form-line">
                                <label for="nama_periode">Nama Periode</label>
                                <td><select class='form-control' name='nama_periode' required>
                                @foreach($nama_periode as $key=>$value) 
                                  <option value="{{$value['nama_periode']}}">{{$value['nama_periode']}}</option>
                                  @endforeach
                                </select>
					        <td>
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
                        
    <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan</button>
       
    </div>
</form>
</div>
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