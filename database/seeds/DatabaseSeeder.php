<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BarangTableSeeder::class);
        $this->call(DocumentTableSeeder::class);
        $this->call(UkuranBarangTableSeeder::class);
        $this->call(MahasiswaTableSeeder::class);
        $this->call(DetailsbarangTableSeeder::class);
    }
}
