<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Aug 2019 14:29:38 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BarangKeluar
 * 
 * @property int $id_brg_keluar
 * @property int $id_barang_ambil
 * @property int $id_barang
 * @property int $id_ukuran
 * @property int $jml_keluar
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Barang $barang
 * @property \App\Models\UkuranBarang $ukuran_barang
 *
 * @package App\Models
 */
class BarangKeluar extends Eloquent
{
	protected $table = 'barang_keluar';
	protected $primaryKey = 'id_brg_keluar';

	protected $casts = [
		'id_barang_ambil' => 'int',
		'id_barang' => 'int',
		'id_ukuran' => 'int',
		'jml_keluar' => 'int'
	];

	protected $fillable = [
		'id_barang_ambil',
		'id_barang',
		'id_ukuran',
		'jml_keluar'
	];

	public function barang()
	{
		return $this->belongsTo(\App\Models\Barang::class, 'id_barang');
	}

	public function ukuran_barang()
	{
		return $this->belongsTo(\App\Models\UkuranBarang::class, 'id_ukuran');
	}
}
