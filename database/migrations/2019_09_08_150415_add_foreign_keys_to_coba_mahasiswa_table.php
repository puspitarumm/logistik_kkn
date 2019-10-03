<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCobaMahasiswaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('coba_mahasiswa', function(Blueprint $table)
		{
			$table->foreign('id_lokasi', 'fk_mhs_lokasi')->references('id_lokasi')->on('lokasi')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_periode', 'fk_mhs_period')->references('id_periode')->on('periode')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_ukuran', 'fk_mhs_uk')->references('id_ukuran')->on('ukuran_barang')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('coba_mahasiswa', function(Blueprint $table)
		{
			$table->dropForeign('fk_mhs_lokasi');
			$table->dropForeign('fk_mhs_period');
			$table->dropForeign('fk_mhs_uk');
		});
	}

}
