<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarangAmbilTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barang_ambil', function(Blueprint $table)
		{
			$table->integer('id_ambil')->primary();
			$table->integer('niu')->index('FK_NIU');
			$table->string('kode_lokasi', 11);
			$table->string('path')->nullable();
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
		Schema::drop('barang_ambil');
	}

}
