<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Aug 2019 14:32:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UkuranBarang
 * 
 * @property int $id_ukuran
 * @property string $ukuran_barang
 * 
 * @property \Illuminate\Database\Eloquent\Collection $barang_keluars
 * @property \Illuminate\Database\Eloquent\Collection $barang_masuks
 * @property \Illuminate\Database\Eloquent\Collection $detailsbarangs
 * @property \Illuminate\Database\Eloquent\Collection $mahasiswas
 *
 * @package App\Models
 */
class UkuranBarang extends Eloquent
{
	protected $table = 'ukuran_barang';
	protected $primaryKey = 'id_ukuran';
	public $timestamps = false;

	protected $fillable = [
		'ukuran_barang'
	];

	public function barang_keluars()
	{
		return $this->hasMany(\App\Models\BarangKeluar::class, 'id_ukuran');
	}

	public function barang_masuks()
	{
		return $this->hasMany(\App\Models\BarangMasuk::class, 'id_ukuran');
	}

	public function detailsbarangs()
	{
		return $this->hasMany(\App\Models\Detailsbarang::class, 'id_ukuran');
	}

	public function mahasiswas()
	{
		return $this->hasMany(\App\Models\Mahasiswa::class, 'id_ukuran');
	}
}
