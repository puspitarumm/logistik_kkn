<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBarangMasukTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('barang_masuk', function(Blueprint $table)
		{
			$table->foreign('id_barang', 'FK_BARANGMASUK_BRG')->references('id_barang')->on('barang')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_ukuran', 'FK_UKURAN_BM')->references('id_ukuran')->on('ukuran_barang')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('barang_masuk', function(Blueprint $table)
		{
			$table->dropForeign('FK_BARANGMASUK_BRG');
			$table->dropForeign('FK_UKURAN_BM');
		});
	}

}
