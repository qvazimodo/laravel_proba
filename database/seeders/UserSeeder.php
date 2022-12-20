<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        User::factory(2)->create();

        $admin = [
            'name' => 'admin',
            'email' => 'admin@admin',
            'email_verified_at' => '2022-12-06 18:20:59',
            'password' => Hash::make('123'), // password
            'remember_token' => 'sfrsfsfsfs',
            'is_admin' => '1'


        ];
        User::insert($admin);
    }
}
