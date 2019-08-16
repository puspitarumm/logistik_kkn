<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Aug 2019 14:29:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Lokasi
 * 
 * @property int $id_lokasi
 * @property string $kode_lokasi
 * @property string $lokasi
 * @property string $penanggungjawab
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
		'kode_lokasi',
		'lokasi',
		'penanggungjawab'
	];
}
