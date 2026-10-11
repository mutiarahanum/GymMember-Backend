<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Membership;
use App\Models\MembershipPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Membership>
 */
class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Membership::class;

    public function definition(): array
    {
        $tanggalMulai = fake()->dateTimeBetween('-1 year', 'now');
        $durasi = fake()->randomElement([30, 90, 180, 365]);

        return [
            'member_id' => Member::inRandomOrder()->first()->id,
            'membership_package_id' => MembershipPackage::inRandomOrder()->first()->id,
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_berakhir' => date('Y-m-d', strtotime("+{$durasi} days", $tanggalMulai->getTimestamp())),
        ];
    }
}
