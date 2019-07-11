<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 27 Jun 2019 06:28:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Document
 * 
 * @property int $id_dokumen
 * @property string $nama_dokumen
 * @property string $dokumen
 * @property string $nama_periode
 *
 * @package App\Models
 */
class Document extends Eloquent
{
	protected $table = 'document';
	protected $primaryKey = 'id_dokumen';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_dokumen' => 'int'
	];

	protected $fillable = [
		'nama_dokumen',
		'dokumen',
		'nama_periode'
	];
}
