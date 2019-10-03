<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 21 Sep 2019 16:05:10 +0700.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CobaMahasiswa
 * 
 * @property int $niu
 * @property string $nama
 * @property string $fakultas
 * @property string $kode_lokasi
 * 
 * @property \App\Models\Lokasikkn $lokasikkn
 *
 * @package App\Models
 */
class CobaMahasiswa extends Eloquent
{
	protected $table = 'coba_mahasiswa';
	protected $primaryKey = 'niu';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'niu' => 'int'
	];

	protected $fillable = [
		'niu',
		'nama',
		'fakultas',
		'kode_lokasi'
	];

	public function lokasikkn()
	{
		return $this->belongsTo(\App\Models\Lokasikkn::class, 'kode_lokasi');
	}
}
