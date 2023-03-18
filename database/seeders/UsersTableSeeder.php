<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        User::create([
//            'first_name' => 'super',
//            'last_name' => 'admin',
//            'role_id' => 1,
//            'mobile' => fake()->phoneNumber(),
//            'email' => 'admin@gmail.com',
//            'email_verified_at' => now(),
//            'password' => bcrypt('12345'), // password
//            'remember_token' => Str::random(10),
//        ]);
        User::factory()->count(500)->create();

        //hash
        // algorithm
        // md5, sha-256,
        // encrypt
        //decrypt
        //laravel bcrypt

        //                User::create([
        //                    'name'=> 'admin',
        //                    'role'=> 'admin',
        //                    'email'=>"admin@gmail.com",
        //                    'password'=>bcrypt('12345'),
        //                    'mobile'=>'01671099723',
        //                ]);
        //

    }
}
