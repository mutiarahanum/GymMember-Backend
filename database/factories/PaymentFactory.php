<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Membership;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'membership_id' => Membership::inRandomOrder()->first()->id,
            'jumlah_pembayaran' => fake()->randomElement([
                100000,
                150000,
                250000,
                450000,
            ]),
            'tanggal_pembayaran' => fake()->dateTimeBetween('-1 year', 'now'),
            'metode_pembayaran' => fake()->randomElement([
                'Tunai',
                'Transfer',
            ]),
            'status_pembayaran' => 'berhasil',
        ];
    }
}
