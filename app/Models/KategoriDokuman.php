<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 02 May 2019 11:10:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class KategoriDokuman
 * 
 * @property int $id_kategori
 * @property bool $kategori_dokumen
 *
 * @package App\Models
 */
class KategoriDokuman extends Eloquent
{
	protected $primaryKey = 'id_kategori';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_kategori' => 'int',
		'kategori_dokumen' => 'bool'
	];

	protected $fillable = [
		'kategori_dokumen'
	];

	
}
