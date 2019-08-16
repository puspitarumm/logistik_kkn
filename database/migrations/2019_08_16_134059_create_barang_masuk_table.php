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
			$table->integer('id_brg_masuk', true);
			$table->date('tgl_masuk');
			$table->integer('id_barang')->index('FK_BARANGMASUK_BRG');
			$table->integer('id_ukuran')->index('FK_UKURAN_BM');
			$table->integer('jml_masuk');
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
