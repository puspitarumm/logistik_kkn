<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDetailsbarangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('detailsbarang', function(Blueprint $table)
		{
			$table->foreign('id_barang', 'FK_BRG_DETAILS')->references('id_barang')->on('barang')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_ukuran', 'FK_DETAILS_UK')->references('id_ukuran')->on('ukuran_barang')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('detailsbarang', function(Blueprint $table)
		{
			$table->dropForeign('FK_BRG_DETAILS');
			$table->dropForeign('FK_DETAILS_UK');
		});
	}

}
