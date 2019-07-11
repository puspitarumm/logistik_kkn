<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 02 May 2019 11:10:36 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BarangKeluar
 * 
 * @property string $id_brg_keluar
 * @property \Carbon\Carbon $tgl_keluar
 * @property int $id_barang
 * @property string $nama_barang
 * @property int $jml_keluar
 * @property string $penanggungjawab
 * @property string $bukti_pertanggungjawaban
 * @property string $bukti_penyerahan
 *
 * @package App\Models
 */
class BarangKeluar extends Eloquent
{
	protected $table = 'barang_keluar';
	protected $primaryKey = 'id_brg_keluar';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_barang' => 'int',
		'jml_keluar' => 'int'
	];

	protected $dates = [
		'tgl_keluar'
	];

	protected $fillable = [
		'tgl_keluar',
		'id_barang',
		'nama_barang',
		'jml_keluar',
		'penanggungjawab',
		'bukti_pertanggungjawaban',
		'bukti_penyerahan'
	];
}
