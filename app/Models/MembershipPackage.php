<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipPackage extends Model
{
    protected $fillable = [
        'nama_paket',
        'durasi',
        'harga',
    ];
}
