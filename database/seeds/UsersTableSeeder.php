<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name'      =>  'Crist Adityo Ikhsan',
            'email'     =>  'aditcrist@yahoo.com',
            'password'  =>  bcrypt('caicai'),
            'admin'     =>  1
        ]);

        App\Profile::create([
            'user_id'       =>  $user->id,
            'alamat'        =>  'pauh',
            'kota'          =>  'padang',
            'kodepos'       =>  '25162',
            'jeniskelamin'  =>  'laki-laki',
            'noktp'         =>  '111000111000',
            'namaktp'       =>  'admin',
            'fotoprofil'    =>  'uploads/avatars/cai33.jpg'
        ]);
    }
}
