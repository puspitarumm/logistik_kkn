<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCobaMahasiswaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coba_mahasiswa', function(Blueprint $table)
		{
			$table->integer('niu')->primary();
			$table->string('nama');
			$table->string('fakultas');
			$table->integer('id_lokasi')->index('fk_mhs_lokasi');
			$table->integer('id_ukuran')->index('fk_mhs_uk');
			$table->integer('id_periode')->index('fk_mhs_period');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coba_mahasiswa');
	}

}
