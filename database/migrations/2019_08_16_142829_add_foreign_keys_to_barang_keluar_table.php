<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBarangKeluarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('barang_keluar', function(Blueprint $table)
		{
			$table->foreign('id_barang', 'FK_id_barang')->references('id_barang')->on('barang')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_ukuran', 'FK_id_ukuran')->references('id_ukuran')->on('ukuran_barang')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('barang_keluar', function(Blueprint $table)
		{
			$table->dropForeign('FK_id_barang');
			$table->dropForeign('FK_id_ukuran');
		});
	}

}
