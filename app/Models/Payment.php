<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'membership_id',
        'jumlah_pembayaran',
        'tanggal_pembayaran',
        'metode_pembayaran',
    ];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}
