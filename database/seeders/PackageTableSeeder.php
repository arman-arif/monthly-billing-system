<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'title' => 'Basic',
            'code' => 'bk',
            'speed' => '1',
            'duration' => '30',
            'price' => '50'
        ]);
    }
}
