<html>
<head>
	<title>pdf</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
        <h4>Tanda Terima Kaos dan Topi</h4>
        <h4>KKN PPM UGM Tahun {{$mahasiswa[0]['periode']['tahun']}} {{$mahasiswa[0]['periode']['nama_periode']}}</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>NIU</th>
				<th>Nama</th>
				<th>Fakultas</th>
				<th>Kode Lokasi</th>
				<th>Lokasi</th>
				<th>Ukuran Kaos</th>
				<th>TTD</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($mahasiswa as $m)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$m->niu}}</td>
				<td>{{$m->nama}}</td>
				<td>{{$m->fakultas}}</td>
				<td>{{$m->kode_lokasi}}</td>
				<td>{{$m->lokasi}}</td>
				<td>{{$m['ukuran_barang']['ukuran_barang']}}</td>
				<td></td>
			</tr>
			@endforeach
		</tbody>
	</table>
 </div>
</body>
</html>