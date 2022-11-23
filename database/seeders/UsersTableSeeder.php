<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //hash
            // algorithm
            // md5, sha-256,
            // encrypt
            //decrypt
            //laravel bcrypt

        User::create([
           'name'=> 'admin',
           'role'=> 'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345'),
            'mobile'=>'01671099723',
        ]);
    }
}
