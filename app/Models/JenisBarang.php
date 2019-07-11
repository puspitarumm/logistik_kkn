<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 02 May 2019 11:10:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class JenisBarang
 * 
 * @property int $id_jenis_barang
 * @property bool $jenis_barang
 *
 * @package App\Models
 */
class JenisBarang extends Eloquent
{
	protected $table = 'jenis_barang';
	protected $primaryKey = 'id_jenis_barang';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_jenis_barang' => 'int',
		'jenis_barang' => 'bool'
	];

	protected $fillable = [
		'jenis_barang'
	];
}
