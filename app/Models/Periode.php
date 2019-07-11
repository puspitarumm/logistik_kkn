<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 08:13:51 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Periode
 * 
 * @property int $id_periode
 * @property string $nama_periode
 * @property int $tahun
 * @property \Carbon\Carbon $tgl_mulai
 * @property \Carbon\Carbon $tgl_berakhir
 *
 * @package App\Models
 */
class Periode extends Eloquent
{
	protected $table = 'periode';
	protected $primaryKey = 'id_periode';
	public $timestamps = false;

	protected $casts = [
		'tahun' => 'int'
	];

	protected $dates = [
		'tgl_mulai',
		'tgl_berakhir'
	];

	protected $fillable = [
		'nama_periode',
		'tahun',
		'tgl_mulai',
		'tgl_berakhir'
	];
}
