<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 02 May 2019 11:10:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UkuranBarang
 * 
 * @property int $id_ukuran
 * @property string $ukuran_barang
 *
 * @package App\Models
 */
class UkuranBarang extends Eloquent
{
	protected $table = 'ukuran_barang';
	protected $primaryKey = 'id_ukuran';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_ukuran' => 'int'
	];

	protected $fillable = [
		'ukuran_barang'
	];
}
