<?php

namespace Database\Factories;

use App\Models\MembershipPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MembershipPackage>
 */
class MembershipPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_paket' => fake()->randomElement([
            'Paket Bulanan',
            'Paket 3 Bulan',
            'Paket 6 Bulan',
            'Paket Tahunan',
        ]),
        'durasi' => fake()->randomElement([30, 90, 180, 365]),
        'harga' => fake()->randomElement([
            100000,
            250000,
            450000,
            800000,
        ]),
        ];
    }
}
