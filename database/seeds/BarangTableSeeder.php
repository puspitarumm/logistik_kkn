<?php

use Illuminate\Database\Seeder;

class BarangTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('barang')->delete();
        
        \DB::table('barang')->insert(array (
            0 => 
            array (
                'id_barang' => 6,
                'nama_barang' => 'Buku Panduan',
                'created_at' => '2019-07-31 14:13:43',
                'updated_at' => '2019-07-31 14:13:43',
            ),
            1 => 
            array (
                'id_barang' => 7,
                'nama_barang' => 'Topi',
                'created_at' => '2019-07-31 14:13:51',
                'updated_at' => '2019-07-31 14:13:51',
            ),
            2 => 
            array (
                'id_barang' => 9,
                'nama_barang' => 'Tali',
                'created_at' => '2019-07-31 14:26:33',
                'updated_at' => '2019-07-31 14:26:33',
            ),
            3 => 
            array (
                'id_barang' => 10,
                'nama_barang' => 'Kayu',
                'created_at' => '2019-08-01 21:38:42',
                'updated_at' => '2019-08-01 14:38:42',
            ),
            4 => 
            array (
                'id_barang' => 11,
                'nama_barang' => 'Kaos',
                'created_at' => '2019-08-08 21:43:08',
                'updated_at' => '2019-08-08 14:43:08',
            ),
        ));
        
        
    }
}