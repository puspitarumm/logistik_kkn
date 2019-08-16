<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Aug 2019 14:29:38 +0000.
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
	public $timestamps = false;

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
