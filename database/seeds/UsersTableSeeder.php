<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 7,
                'name' => 'Arum Puspitasari',
                'username' => 'arum.p',
                'email' => 'arumpuspitasari9898@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Jx64xlw5r/YmaZpX0i6Hu.V.fMffn1U.oVawheeDJG2FCeu2hkmdC',
                'remember_token' => NULL,
                'created_at' => '2019-08-07 11:46:14',
                'updated_at' => '2019-08-07 11:46:14',
            ),
            1 => 
            array (
                'id' => 8,
                'name' => 'Brygytha Shefa',
                'username' => 'brygytha.s',
                'email' => 'brygytha.s@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$jqlIK6XX1Q5k7KRqNxqhgupECX5p3j6fIGEwVer0Gkwp9JB2dp7TS',
                'remember_token' => NULL,
                'created_at' => '2019-08-07 12:06:56',
                'updated_at' => '2019-08-07 12:06:56',
            ),
            2 => 
            array (
                'id' => 9,
                'name' => 'Jessya Vianca Tarischa',
                'username' => 'jessvnca',
                'email' => 'jess.v@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$QNVp.yLankYF4EI3CW6xHe7Ss0Oh1lfm6dlTs1TaO5QeWuOYDfmHu',
                'remember_token' => NULL,
                'created_at' => '2019-08-13 14:25:17',
                'updated_at' => '2019-08-13 14:25:17',
            ),
        ));
        
        
    }
}