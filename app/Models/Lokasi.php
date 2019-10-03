<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 13 Sep 2019 17:59:48 +0700.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Lokasi
 * 
 * @property int $id_lokasi
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
	protected $primaryKey = 'id_lokasi';
	public $timestamps = false;

	protected $fillable = [
		'kode_lokasi',
		'lokasi'
	];

	public function coba_mahasiswas()
	{
		return $this->hasMany(\App\Models\CobaMahasiswa::class, 'id_lokasi');
	}
}
