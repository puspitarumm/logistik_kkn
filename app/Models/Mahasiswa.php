<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 13 Jul 2019 09:54:07 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Mahasiswa
 * 
 * @property int $niu
 * @property string $nama
 * @property string $fakultas
 * @property string $lokasi
 * @property string $kode_lokasi
 * @property int $id_ukuran
 * @property int $id_periode
 * 
 * @property \App\Models\Periode $periode
 * @property \App\Models\UkuranBarang $ukuran_barang
 *
 * @package App\Models
 */
class Mahasiswa extends Eloquent
{
	protected $table = 'mahasiswa';
	protected $primaryKey = 'niu';
	public $incrementing = false;
	public $timestamps = false;

	// protected $casts = [
	// 	'niu' => 'int',
	// 	'id_ukuran' => 'int',
	// 	'id_periode' => 'int'
	// ];

	protected $fillable = [
		'niu',
		'id_ukuran',
		'nama',
		'fakultas',
		'lokasi',
		'kode_lokasi',
		'id_periode',
	];

	public function periode()
	{
		return $this->belongsTo(\App\Models\Periode::class, 'id_periode');
	}

	public function ukuran_barang()
	{
		return $this->belongsTo(\App\Models\UkuranBarang::class, 'id_ukuran');
	}
}
