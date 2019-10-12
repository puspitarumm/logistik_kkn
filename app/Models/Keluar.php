<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 06 Oct 2019 12:06:01 +0700.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Keluar
 * 
 * @property int $id_keluar
 * @property int $id_details
 * @property int $jml_keluar
 * @property \Carbon\Carbon $created_at
 * 
 * @property \App\Models\Detailsbarang $detailsbarang
 *
 * @package App\Models
 */
class Keluar extends Eloquent
{
	protected $table = 'keluar';
	protected $primaryKey = 'id_keluar';
	public $timestamps = false;

	protected $casts = [
		'id_details' => 'int',
		'jml_keluar' => 'int'
	];

	protected $fillable = [
		'id_details',
		'jml_keluar'
	];

	public function detailsbarang()
	{
		return $this->belongsTo(\App\Models\Detailsbarang::class, 'id_details');
	}
}
