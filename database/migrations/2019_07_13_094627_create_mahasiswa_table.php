<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMahasiswaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mahasiswa', function(Blueprint $table)
		{
			$table->integer('niu')->primary();
			$table->string('nama');
			$table->string('fakultas');
			$table->string('lokasi');
			$table->string('kode_lokasi');
			$table->integer('id_ukuran');
			$table->integer('id_periode');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mahasiswa');
	}

}
