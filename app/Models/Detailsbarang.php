<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Aug 2019 14:29:38 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Detailsbarang
 * 
 * @property int $id_details
 * @property int $id_barang
 * @property int $id_ukuran
 * @property int $stok
 * 
 * @property \App\Models\Barang $barang
 * @property \App\Models\UkuranBarang $ukuran_barang
 *
 * @package App\Models
 */
class Detailsbarang extends Eloquent
{
	protected $table = 'detailsbarang';
	protected $primaryKey = 'id_details';
	public $timestamps = false;

	protected $casts = [
		'id_barang' => 'int',
		'id_ukuran' => 'int',
		'stok' => 'int'
	];

	protected $fillable = [
		'id_barang',
		'id_ukuran',
		'stok'
	];

	public function barang()
	{
		return $this->belongsTo(\App\Models\Barang::class, 'id_barang');
	}

	public function ukuran_barang()
	{
		return $this->belongsTo(\App\Models\UkuranBarang::class, 'id_ukuran');
	}
}
