<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMahasiswaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mahasiswa', function(Blueprint $table)
		{
			$table->foreign('id_periode', 'fk_periode')->references('id_periode')->on('periode')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_ukuran', 'fk_ukuran')->references('id_ukuran')->on('ukuran_barang')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mahasiswa', function(Blueprint $table)
		{
			$table->dropForeign('fk_periode');
			$table->dropForeign('fk_ukuran');
		});
	}

}
