<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarangMasukTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barang_masuk', function(Blueprint $table)
		{
			$table->string('id_brg_masuk', 50)->primary();
			$table->date('tgl_masuk');
			$table->integer('id_barang');
			$table->string('nama_barang', 50);
			$table->integer('jumlah_masuk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('barang_masuk');
	}

}
