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
			$table->string('id_brg_keluar', 50)->primary();
			$table->date('tgl_keluar');
			$table->integer('id_barang');
			$table->string('nama_barang', 50);
			$table->integer('jml_keluar');
			$table->string('penanggungjawab', 50);
			$table->string('bukti_pertanggungjawaban', 50);
			$table->string('bukti_penyerahan', 50);
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
