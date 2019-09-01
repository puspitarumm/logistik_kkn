<html>
<head>
	<title>Laporan Stok Barang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center><h4>Laporan Stok Barang</h4></center>
		<right><h9>Dicetak pada :{{$tgl_cetak}}</h9></right>
	
 
	<table class='table table-bordered'>
		<thead>
			<tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Ukuran Barang</th>
                  <th>Stok</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $data)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$data['barang']['nama_barang']}}</td>
                <td>{{$data['ukuran_barang']['ukuran_barang']}}</td>
                <td>{{$data['stok']}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>