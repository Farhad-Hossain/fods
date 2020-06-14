<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
        	'name'=>Str::random(5),
        	'role'=>0,
        	'email'=>'admin@demo.com',
        	'password'=>Hash::make('123456'),
        	'password_salt'=>'123456',
        	'last_login_ip'=>'127.0.0.1',
        ]);
    }
}
