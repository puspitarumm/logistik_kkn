<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarangKeluarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barang_keluar', function(Blueprint $table)
		{
			$table->integer('id_brg_keluar', true);
			$table->integer('id_barang_ambil');
			$table->integer('id_barang')->index('FK_id_barang');
			$table->integer('id_ukuran')->index('FK_id_ukuran');
			$table->integer('jml_keluar');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('barang_keluar');
	}

}
