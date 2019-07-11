<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 02 May 2019 11:10:36 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Admin
 * 
 * @property int $id_admin
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $email
 * @property string $status
 *
 * @package App\Models
 */
class Admin extends Eloquent
{
	protected $table = 'admin';
	protected $primaryKey = 'id_admin';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_admin' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'nama',
		'email',
		'status'
	];
}
