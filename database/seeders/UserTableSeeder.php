<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "name" => "Arman Arif",
            "username" => "arman",
            "email" => "dev@armanarif.com",
            "email_verified_at" => now(),
            "password" => bcrypt('armanarif'),
        ]);

        $user->assignRole('admin');
    }
}
