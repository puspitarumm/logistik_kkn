@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      
@endsection
@section('content')
<div class="container">

 <div class="row">
      <div class="col-md-4">
      <table class="table table-hover">
        <tr>
          <th>#</th>
          <th>Judul</th>
          <th>Gambar</th>
        </tr>
        @if (count($uploadFile) > 0)
        @foreach ($uploadFile as $uploadFiles)
        <tr>
          <td></td>
          <td>{{ $uploadFiles->judul }}</td>
          <td><img src="{{ asset('gambar/' . $uploadFiles->gambar) }}" width="50px" height="50px"></td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="3" class="text-center">Tidak ada data</td>
        </tr>
        @endif
      </table>
    </div>
  </div>
  <h1>Membuat Fitur Upload Menggunakan Ajax di Laravel</h1>
  <form action="{{ url('upload') }}" enctype="multipart/form-data" method="POST">
    <div class="alert alert-danger print-error-msg" style="display:none">
      <ul></ul>
    </div>

    <div class="print-img" style="display:none">
      <img src="" style="height:300px;width:500px">
    </div>


    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label>Nama Dokumen:</label>
      <input type="text" name="nama_dokumen" class="form-control" placeholder="Masukkan Nama Dokumen">
    </div>

    <div class="form-group">
      <label>Nama Periode:</label>
      <td><select class='form-control' name='id_periode' required>
                    <option value="">-- Select Periode --</option>
                      @foreach($periode as $item)
                      <option value="{{$item['id_periode']}}">{{$item['nama_periode']}}</option>
                      @endforeach
                      </select>
					        <td>
    </div>

      <div class="form-group">
      <label>Dokumen:</label>
      <input type="file" name="dokumen" class="form-control">
    </div>

    <div class="form-group">
      <button class="btn btn-success upload-image" type="submit">Kirim</button>
    </div>
  </form>
</div>

<div class="row">
      <div class="col-md-4">
      <table class="table table-hover">
        <tr>
          <th>#</th>
          <th>Nama Dokumen</th>
          <th>Nama Periode</th>
          <th>Dokumen</th>
        </tr>
        @if (count($uploadFile) > 0)
        @foreach ($uploadFile as $uploadFiles)
        <tr>
          <td></td>
          <td>{{ $uploadFiles->nama_dokumen }}</td>
          <td>{{$uploadFiles['periode']['nama_periode']}}</td>
          <td><img src="{{ asset('dokumen/' . $uploadFiles->dokumen) }}" width="50px" height="50px"></td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="3" class="text-center">Tidak ada data</td>
        </tr>
        @endif
      </table>
    </div>
  </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script type="text/javascript">
  $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });

  var options = { 
    complete: function(response) 
    {
        if($.isEmptyObject(response.responseJSON.error)){
            $("input[name='nama_dokumen']").val('');
            $("input[name='id_periode']").val('');
            $(".print-img").css('display','block');
        $(".print-img").find('img').attr('src','/dokumen/'+response.responseJSON.dokumen);
            alert('Upload gambar berhasil.');
        }else{
            printErrorMsg(response.responseJSON.error);
        }
    }
  };

  function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
  }
</script>

@endsection