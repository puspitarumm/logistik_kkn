$data1 = DB::table('transaksi_konven')->select('id')->whereYear('created_at',date('Y'))->whereMonth('created_at','1')->count();
$data1 = DB::table('transaksi_konven')->select('id')->whereYear('created_at',date('Y'))->whereMonth('created_at','2')->count();
$data1 = DB::table('transaksi_konven')->select('id')->whereYear('created_at',date('Y'))->whereMonth('created_at','3')->count();
$data1 = DB::table('transaksi_konven')->select('id')->whereYear('created_at',date('Y'))->whereMonth('created_at','4')->count();
$data1 = DB::table('transaksi_konven')->select('id')->whereYear('created_at',date('Y'))->whereMonth('created_at','5')->count();
$data1 = DB::table('transaksi_konven')->select('id')->whereYear('created_at',date('Y'))->whereMonth('created_at','6')->count();
$data1 = DB::table('transaksi_konven')->select('id')->whereYear('created_at',date('Y'))->whereMonth('created_at','7')->count();
$data1 = DB::table('transaksi_konven')->select('id')->whereYear('created_at',date('Y'))->whereMonth('created_at','8')->count();
$data1 = DB::table('transaksi_konven')->select('id')->whereYear('created_at',date('Y'))->whereMonth('created_at','9')->count();
$data1 = DB::table('transaksi_konven')->select('id')->whereYear('created_at',date('Y'))->whereMonth('created_at','10')->count();
$data1 = DB::table('transaksi_konven')->select('id')->whereYear('created_at',date('Y'))->whereMonth('created_at','11')->count();
$data1 = DB::table('transaksi_konven')->select('id')->whereYear('created_at',date('Y'))->whereMonth('created_at','12')->count();

$chart1 = \Chart::title([
'text' =. 'Grafik Transaksi Bulanan'])
->chart([
    'type' => 'line',
    'renderTo' => 'chart1'
    ])