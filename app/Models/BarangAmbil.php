<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Aug 2019 14:29:38 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BarangAmbil
 * 
 * @property int $id_ambil
 * @property int $niu
 * @property string $kode_lokasi
 * @property string $path
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Mahasiswa $mahasiswa
 *
 * @package App\Models
 */
class BarangAmbil extends Eloquent
{
	protected $table = 'barang_ambil';
	protected $primaryKey = 'id_ambil';
	public $incrementing = false;

	protected $casts = [
		'id_ambil' => 'int',
		'niu' => 'int'
	];

	protected $fillable = [
		'niu',
		'kode_lokasi',
		'path'
	];

	public function mahasiswa()
	{
		return $this->belongsTo(\App\Models\Mahasiswa::class, 'niu');
	}

}
