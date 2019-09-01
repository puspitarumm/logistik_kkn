<?php

use Illuminate\Database\Seeder;

class DetailsbarangTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('detailsbarang')->delete();
        
        \DB::table('detailsbarang')->insert(array (
            0 => 
            array (
                'id_details' => 1,
                'id_barang' => 6,
                'id_ukuran' => 1,
                'stok' => 910,
            ),
            1 => 
            array (
                'id_details' => 2,
                'id_barang' => 11,
                'id_ukuran' => 2,
                'stok' => 920,
            ),
            2 => 
            array (
                'id_details' => 3,
                'id_barang' => 11,
                'id_ukuran' => 3,
                'stok' => 792,
            ),
            3 => 
            array (
                'id_details' => 4,
                'id_barang' => 11,
                'id_ukuran' => 4,
                'stok' => 784,
            ),
            4 => 
            array (
                'id_details' => 5,
                'id_barang' => 11,
                'id_ukuran' => 5,
                'stok' => 690,
            ),
            5 => 
            array (
                'id_details' => 6,
                'id_barang' => 11,
                'id_ukuran' => 6,
                'stok' => 890,
            ),
            6 => 
            array (
                'id_details' => 7,
                'id_barang' => 11,
                'id_ukuran' => 7,
                'stok' => 787,
            ),
            7 => 
            array (
                'id_details' => 8,
                'id_barang' => 10,
                'id_ukuran' => 1,
                'stok' => 664,
            ),
            8 => 
            array (
                'id_details' => 9,
                'id_barang' => 9,
                'id_ukuran' => 1,
                'stok' => 890,
            ),
            9 => 
            array (
                'id_details' => 10,
                'id_barang' => 7,
                'id_ukuran' => 1,
                'stok' => 820,
            ),
        ));
        
        
    }
}