<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Aug 2019 14:29:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Document
 * 
 * @property int $id_dokumen
 * @property string $nama_dokumen
 * @property int $id_periode
 * @property string $dokumen
 * 
 * @property \App\Models\Periode $periode
 *
 * @package App\Models
 */
class Document extends Eloquent
{
	protected $table = 'document';
	protected $primaryKey = 'id_dokumen';
	public $timestamps = false;

	protected $casts = [
		'id_periode' => 'int'
	];

	protected $fillable = [
		'nama_dokumen',
		'id_periode',
		'dokumen'
	];

	public function periode()
	{
		return $this->belongsTo(\App\Models\Periode::class, 'id_periode');
	}
}
