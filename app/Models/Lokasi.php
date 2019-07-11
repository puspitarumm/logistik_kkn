<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 02 May 2019 11:10:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Lokasi
 * 
 * @property int $id_lokasi
 * @property string $nama_lokasi
 *
 * @package App\Models
 */
class Lokasi extends Eloquent
{
	protected $table = 'lokasi';
	protected $primaryKey = 'id_lokasi';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_lokasi' => 'int'
	];

	protected $fillable = [
		'nama_lokasi'
	];
}
