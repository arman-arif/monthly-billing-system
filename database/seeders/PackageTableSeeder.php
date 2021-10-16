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
            'speed' => '1', // in Mbps
            'duration' => '30', // in Days
            'price' => '50' // in Takas
        ],[
            'title' => 'Standard',
            'code' => 'sd',
            'speed' => '2', // in Mbps
            'duration' => '30', // in Days
            'price' => '50' // in Takas
        ]);
    }
}
