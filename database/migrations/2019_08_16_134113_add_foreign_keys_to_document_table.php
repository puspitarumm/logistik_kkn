<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('document', function(Blueprint $table)
		{
			$table->foreign('id_periode', 'fk_periode_dokumen')->references('id_periode')->on('periode')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('document', function(Blueprint $table)
		{
			$table->dropForeign('fk_periode_dokumen');
		});
	}

}
