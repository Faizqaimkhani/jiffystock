<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'  => 'admin',
            'email' =>'admin@admin.com',
            'usertype'=>'admin',
            // 'email_verified_at' => now(),
            'password'=> Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
