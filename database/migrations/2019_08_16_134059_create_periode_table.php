<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeriodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('periode', function(Blueprint $table)
		{
			$table->integer('id_periode', true);
			$table->string('nama_periode', 50);
			$table->integer('tahun');
			$table->date('tgl_mulai');
			$table->date('tgl_berakhir');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('periode');
	}

}
