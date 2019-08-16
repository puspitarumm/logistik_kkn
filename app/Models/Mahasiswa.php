<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Aug 2019 14:29:39 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $barang_ambils
 *
 * @package App\Models
 */
class Mahasiswa extends Eloquent
{
	protected $table = 'mahasiswa';
	protected $primaryKey = 'niu';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'niu' => 'int',
		'id_ukuran' => 'int',
		'id_periode' => 'int'
	];

	protected $fillable = [
		'nama',
		'fakultas',
		'lokasi',
		'kode_lokasi',
		'id_ukuran',
		'id_periode'
	];

	public function periode()
	{
		return $this->belongsTo(\App\Models\Periode::class, 'id_periode');
	}

	public function ukuran_barang()
	{
		return $this->belongsTo(\App\Models\UkuranBarang::class, 'id_ukuran');
	}

	public function barang_ambils()
	{
		return $this->hasMany(\App\Models\BarangAmbil::class, 'niu');
	}
}
