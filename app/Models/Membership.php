<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Payment;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'membership_package_id',
        'tanggal_mulai',
        'tanggal_berakhir',
    ];

    protected $appends = [
        'status_membership',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_mulai' => 'date',
            'tanggal_berakhir' => 'date',
        ];
    }

    public function getStatusMembershipAttribute(): string
    {
        $today = now()->startOfDay();

        if ($this->tanggal_mulai->startOfDay()->greaterThan($today)) {
            return 'belum aktif';
        }

        if ($this->tanggal_berakhir->startOfDay()->lessThan($today)) {
            return 'sudah berakhir';
        }

        return 'aktif';
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function membershipPackage()
    {
        return $this->belongsTo(MembershipPackage::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
