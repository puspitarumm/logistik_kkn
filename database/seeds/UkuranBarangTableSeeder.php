<?php

use Illuminate\Database\Seeder;

class UkuranBarangTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ukuran_barang')->delete();
        
        \DB::table('ukuran_barang')->insert(array (
            0 => 
            array (
                'id_ukuran' => 1,
                'ukuran_barang' => 'All',
            ),
            1 => 
            array (
                'id_ukuran' => 2,
                'ukuran_barang' => 'S',
            ),
            2 => 
            array (
                'id_ukuran' => 3,
                'ukuran_barang' => 'M',
            ),
            3 => 
            array (
                'id_ukuran' => 4,
                'ukuran_barang' => 'L',
            ),
            4 => 
            array (
                'id_ukuran' => 5,
                'ukuran_barang' => 'XL',
            ),
            5 => 
            array (
                'id_ukuran' => 6,
                'ukuran_barang' => 'XXL',
            ),
            6 => 
            array (
                'id_ukuran' => 7,
                'ukuran_barang' => 'XXXL',
            ),
        ));
        
        
    }
}