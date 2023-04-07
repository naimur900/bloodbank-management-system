<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $pass = Hash::make('password');
        User::create([
            'name' => 'User Consumer',
            'email' => 'consumer@gmail.com',
            'password' => $pass,
            'type' => User::TYPE_CONSUMER,
        ]);
        User::create([
            'name' => 'User Hospital',
            'email' => 'hospital@gmail.com',
            'password' => $pass,
            'type' => User::TYPE_HOSPITAL,
        ]);

        User::create([
            'name' => 'User test',
            'email' => 'test@gmail.com',
            'password' => $pass,
            'type' => User::TYPE_CONSUMER
        ]);
    }
}
