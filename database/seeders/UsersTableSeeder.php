<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name'      => 'Administrator',
            'email'     => env('ADMIN_USER'),
            'password'  => bcrypt(env('ADMIN_PASSWORD')),
        ]);
    }
}
