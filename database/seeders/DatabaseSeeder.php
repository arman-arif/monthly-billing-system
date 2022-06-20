<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PackageTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
    }
}
