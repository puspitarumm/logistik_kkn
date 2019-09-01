<?php

use Illuminate\Database\Seeder;

class MahasiswaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mahasiswa')->delete();
        
        \DB::table('mahasiswa')->insert(array (
            0 => 
            array (
                'niu' => 11,
                'nama' => 'ar',
                'fakultas' => 'Sekolah Vokasi',
                'lokasi' => 'Klebengans',
                'kode_lokasi' => 'K1001',
                'id_ukuran' => 5,
                'id_periode' => 1,
            ),
            1 => 
            array (
                'niu' => 12,
                'nama' => 'um',
                'fakultas' => 'Peternakan',
                'lokasi' => 'Karanggayam, depok',
                'kode_lokasi' => 'K002',
                'id_ukuran' => 3,
                'id_periode' => 2,
            ),
            2 => 
            array (
                'niu' => 13,
                'nama' => 'pu',
                'fakultas' => 'Kehutahan',
                'lokasi' => 'Sendowo, depok',
                'kode_lokasi' => 'K003',
                'id_ukuran' => 4,
                'id_periode' => 4,
            ),
            3 => 
            array (
                'niu' => 111000,
                'nama' => 'clare',
                'fakultas' => 'Sekolah Vokasi',
                'lokasi' => 'Klebengans',
                'kode_lokasi' => 'K1001',
                'id_ukuran' => 5,
                'id_periode' => 1,
            ),
            4 => 
            array (
                'niu' => 222333,
                'nama' => 'daenrys',
                'fakultas' => 'Peternakan',
                'lokasi' => 'Karanggayam, depok',
                'kode_lokasi' => 'K002',
                'id_ukuran' => 3,
                'id_periode' => 2,
            ),
            5 => 
            array (
                'niu' => 301008,
                'nama' => 'shefa',
                'fakultas' => 'Kedokteran',
                'lokasi' => 'Jakal km 1',
                'kode_lokasi' => '2018-JI001',
                'id_ukuran' => 4,
                'id_periode' => 3,
            ),
            6 => 
            array (
                'niu' => 301009,
                'nama' => 'mischa',
                'fakultas' => 'Kedokteran',
                'lokasi' => 'Jakal km 2',
                'kode_lokasi' => '2018-JI002',
                'id_ukuran' => 4,
                'id_periode' => 1,
            ),
            7 => 
            array (
                'niu' => 301010,
                'nama' => 'dibah',
                'fakultas' => 'Kedokteran',
                'lokasi' => 'Jakal km 3',
                'kode_lokasi' => '2018-JI003',
                'id_ukuran' => 4,
                'id_periode' => 15,
            ),
            8 => 
            array (
                'niu' => 401008,
                'nama' => 'Arum',
                'fakultas' => 'Sekolah Vokasi',
                'lokasi' => 'Klebengans',
                'kode_lokasi' => 'K1001',
                'id_ukuran' => 1,
                'id_periode' => 1,
            ),
            9 => 
            array (
                'niu' => 401009,
                'nama' => 'Puspita',
                'fakultas' => 'Peternakan',
                'lokasi' => 'Karanggayam, depok',
                'kode_lokasi' => 'K002',
                'id_ukuran' => 1,
                'id_periode' => 1,
            ),
            10 => 
            array (
                'niu' => 401010,
                'nama' => '401010',
                'fakultas' => 'Kehutahan',
                'lokasi' => 'Sendowo, depok',
                'kode_lokasi' => 'K003',
                'id_ukuran' => 1,
                'id_periode' => 1,
            ),
            11 => 
            array (
                'niu' => 444555,
                'nama' => 'brienne',
                'fakultas' => 'Kehutahan',
                'lokasi' => 'Sendowo, depok',
                'kode_lokasi' => 'K003',
                'id_ukuran' => 4,
                'id_periode' => 4,
            ),
            12 => 
            array (
                'niu' => 555999,
                'nama' => 'clare',
                'fakultas' => 'Sekolah Vokasi',
                'lokasi' => 'Klebengans',
                'kode_lokasi' => 'K1001',
                'id_ukuran' => 5,
                'id_periode' => 1,
            ),
            13 => 
            array (
                'niu' => 777888,
                'nama' => 'daenrys',
                'fakultas' => 'Peternakan',
                'lokasi' => 'Karanggayam, depok',
                'kode_lokasi' => 'K002',
                'id_ukuran' => 3,
                'id_periode' => 2,
            ),
            14 => 
            array (
                'niu' => 999000,
                'nama' => 'brienne',
                'fakultas' => 'Kehutahan',
                'lokasi' => 'Sendowo, depok',
                'kode_lokasi' => 'K003',
                'id_ukuran' => 4,
                'id_periode' => 4,
            ),
        ));
        
        
    }
}