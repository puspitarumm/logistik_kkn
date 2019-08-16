<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailsbarangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detailsbarang', function(Blueprint $table)
		{
			$table->integer('id_details', true);
			$table->integer('id_barang')->index('FK_BRG_DETAILS');
			$table->integer('id_ukuran')->index('FK_DETAILS_UK');
			$table->integer('stok');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('detailsbarang');
	}

}
