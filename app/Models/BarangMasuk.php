<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 29 Jul 2019 14:38:10 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BarangMasuk
 * 
 * @property int $id_brg_masuk
 * @property \Carbon\Carbon $tgl_masuk
 * @property int $id_barang
 * @property int $id_ukuran
 * @property int $jml_masuk
 * 
 * @property \App\Models\Barang $barang
 * @property \App\Models\UkuranBarang $ukuran_barang
 *
 * @package App\Models
 */
class BarangMasuk extends Eloquent
{
	protected $table = 'barang_masuk';
	protected $primaryKey = 'id_brg_masuk';
	public $timestamps = false;

	protected $casts = [
		'id_barang' => 'int',
		'id_ukuran' => 'int',
		'jml_masuk' => 'int'
	];

	protected $dates = [
		'tgl_masuk'
	];

	protected $fillable = [
		'tgl_masuk',
		'id_barang',
		'id_ukuran',
		'jml_masuk'
	];

	public function barang()
	{
		return $this->belongsTo(\App\Models\Barang::class, 'id_brg_masuk');
	}

	public function ukuran_barang()
	{
		return $this->belongsTo(\App\Models\UkuranBarang::class, 'id_ukuran');
	}
}
