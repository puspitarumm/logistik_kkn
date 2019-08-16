<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Aug 2019 14:29:38 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Barang
 * 
 * @property int $id_barang
 * @property string $nama_barang
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $barang_keluars
 * @property \Illuminate\Database\Eloquent\Collection $barang_masuks
 * @property \Illuminate\Database\Eloquent\Collection $detailsbarangs
 *
 * @package App\Models
 */
class Barang extends Eloquent
{
	protected $table = 'barang';
	protected $primaryKey = 'id_barang';

	protected $fillable = [
		'nama_barang'
	];

	public function barang_keluars()
	{
		return $this->hasMany(\App\Models\BarangKeluar::class, 'id_barang');
	}

	public function barang_masuks()
	{
		return $this->hasMany(\App\Models\BarangMasuk::class, 'id_barang');
	}

	public function detailsbarangs()
	{
		return $this->hasMany(\App\Models\Detailsbarang::class, 'id_barang');
	}
}
