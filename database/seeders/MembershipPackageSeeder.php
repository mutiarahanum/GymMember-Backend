<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MembershipPackage;

class MembershipPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MembershipPackage::create([
            'nama_paket' => 'Paket Bulanan',
            'durasi' => 30,
            'harga' => 100000,
        ]);

        MembershipPackage::create([
            'nama_paket' => 'Paket 3 Bulan',
            'durasi' => 90,
            'harga' => 250000,
        ]);

        MembershipPackage::create([
            'nama_paket' => 'Paket 6 Bulan',
            'durasi' => 180,
            'harga' => 450000,
        ]);

        MembershipPackage::create([
            'nama_paket' => 'Paket Tahunan',
            'durasi' => 365,
            'harga' => 800000,
        ]);
    }
    
}
