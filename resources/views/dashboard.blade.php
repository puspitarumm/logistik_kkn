<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!--Get your own code at fontawesome.com-->
</head>
<body>
@extends('layouts.master')
@section('content-header')
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      
@endsection
@section('content')
 <!-- Main content -->
 <section class="content">
 
          <div class="panel">
            <div id="chartBarangMasuk"></div>
          </div>
       
         

@endsection

@section('custom-script')
<script>
  
    
  Highcharts.chart('chartBarangMasuk', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Grafik Transaksi'
    },
    subtitle: {
        text: 'Per Tahun'
    },
    xAxis: {
        categories: {!! json_encode($categories) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} transaksi</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: {!! json_encode($series)!!}
});
</script>
@endsection
</body>
</html>