<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 02 May 2019 11:10:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SatuanBarang
 * 
 * @property int $id_satuan
 * @property string $satuan_barang
 *
 * @package App\Models
 */
class SatuanBarang extends Eloquent
{
	protected $table = 'satuan_barang';
	protected $primaryKey = 'id_satuan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_satuan' => 'int'
	];

	protected $fillable = [
		'satuan_barang'
	];
}
