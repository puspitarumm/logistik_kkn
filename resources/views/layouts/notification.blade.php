@if (Session::has('error'))
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
    @foreach(Session::get('error') as $e)
            {{$e}} <br/>
    @endforeach
</div>    
@php
    Session::forget('error');
@endphp
@endif

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-warning"></i> Berhasil</h4>
    @foreach(Session::get('success') as $s)
            {{$s}} <br/>
    @endforeach
</div>    
@php
    Session::forget('success');
@endphp
@endif