<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 07 Jul 2019 07:44:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Barang
 * 
 * @property int $id_barang
 * @property string $nama_barang
 * @property int $stok
 * @property int $id_ukuran
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Barang extends Eloquent
{
	protected $table = 'barang';
	protected $primaryKey = 'id_barang';

	protected $casts = [
		'stok' => 'int',
		'id_ukuran' => 'int'
	];

	protected $fillable = [
		'nama_barang',
		'stok',
		'id_ukuran'
	];
	public function ukuran(){
		return $this->belongsTo(\App\Models\UkuranBarang::class,'id_ukuran');
	}
}

