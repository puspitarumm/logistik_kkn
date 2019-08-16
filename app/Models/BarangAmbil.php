<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 02 May 2019 11:10:36 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class BarangAmbil extends Eloquent
{
	protected $table = 'barang_ambil';
	protected $primaryKey = 'id_ambil';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_ambil' => 'int'
	];

	// protected $dates = [
	// 	'tgl_keluar'
	// ];

	protected $fillable = [
		'niu',
		'kode_lokasi'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\Mahasiswa::class, 'niu');
	}
}
