<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 28 Jun 2019 17:43:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Datamahasiswa
 * 
 * @property string $nim
 * @property string $nama
 * @property string $fakultas
 * @property string $kode_lokasi
 * @property int $id_ukuran
 *
 * @package App\Models
 */
class Datamahasiswa extends Eloquent
{
	protected $table = 'datamahasiswa';
	protected $primaryKey = 'nim';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_ukuran' => 'int'
	];

	protected $fillable = [
		'nama',
		'fakultas',
		'lokasi',
		'kode_lokasi',
		'ukuran_barang',
		'id_ukuran'
	];
}
