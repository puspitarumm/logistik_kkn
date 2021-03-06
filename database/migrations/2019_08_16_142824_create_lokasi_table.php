<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLokasiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lokasi', function(Blueprint $table)
		{
			$table->integer('id_lokasi')->primary();
			$table->string('kode_lokasi', 50)->unique('kode_lokasi');
			$table->text('lokasi', 65535);
			$table->string('penanggungjawab', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lokasi');
	}

}
