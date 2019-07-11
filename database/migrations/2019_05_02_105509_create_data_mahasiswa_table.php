<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataMahasiswaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data_mahasiswa', function(Blueprint $table)
		{
			$table->string('nim', 50)->primary();
			$table->string('nama', 100);
			$table->string('fakultas', 100);
			$table->string('nama_lokasi', 100);
			$table->string('kode_lokasi', 50);
			$table->enum('ukuran_kaos', array('M','S','XL'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('data_mahasiswa');
	}

}
