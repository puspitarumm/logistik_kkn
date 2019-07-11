<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 02 May 2019 11:10:36 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BarangMasuk
 * 
 * @property string $id_brg_masuk
 * @property \Carbon\Carbon $tgl_masuk
 * @property int $id_barang
 * @property string $nama_barang
 * @property int $jumlah_masuk
 *
 * @package App\Models
 */
class BarangMasuk extends Eloquent
{
	protected $table = 'barang_masuk';
	protected $primaryKey = 'id_brg_masuk';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_barang' => 'int',
		'jumlah_masuk' => 'int'
	];

	protected $dates = [
		'tgl_masuk'
	];

	protected $fillable = [
		'tgl_masuk',
		'id_barang',
		'nama_barang',
		'jumlah_masuk'
	];
}
