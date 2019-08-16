<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Aug 2019 14:33:04 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $documents
 * @property \Illuminate\Database\Eloquent\Collection $mahasiswas
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

	public function documents()
	{
		return $this->hasMany(\App\Models\Document::class, 'id_periode');
	}

	public function mahasiswas()
	{
		return $this->hasMany(\App\Models\Mahasiswa::class, 'id_periode');
	}
}
