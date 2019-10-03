<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER update_masuk AFTER INSERT ON `barang_masuk` FOR EACH ROW
        BEGIN
        if(old.jml_masuk>new.jml_masuk) then
        UPDATE detailsbarang 
        SET stok=stok-(OLD.jml_masuk-NEW.jml_masuk)
        WHERE detailsbarang.id_barang=new.id_barang;
        elseif(old.jml_masuk<new.jml_masuk) THEN
        UPDATE detailsbarang 
        SET stok=stok+(NEW.jml_masuk-OLD.jml_masuk)
        WHERE detailsbarang.id_barang=new.id_barang;
        END IF;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger');
    }
}
