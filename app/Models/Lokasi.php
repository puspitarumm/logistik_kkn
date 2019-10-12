<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 21 Sep 2019 16:06:37 +0700.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Lokasikkn
 * 
 * @property string $kode_lokasi
 * @property string $lokasi
 * 
 * @property \Illuminate\Database\Eloquent\Collection $coba_mahasiswas
 *
 * @package App\Models
 */
class Lokasi extends Eloquent
{
	protected $table = 'lokasi';
	protected $primaryKey = 'kode_lokasi';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'lokasi'
	];

	public function coba_mahasiswas()
	{
		return $this->hasMany(\App\Models\CobaMahasiswa::class, 'kode_lokasi');
	}
}
