<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBarangAmbilTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('barang_ambil', function(Blueprint $table)
		{
			$table->foreign('niu', 'FK_NIU')->references('niu')->on('mahasiswa')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('barang_ambil', function(Blueprint $table)
		{
			$table->dropForeign('FK_NIU');
		});
	}

}
