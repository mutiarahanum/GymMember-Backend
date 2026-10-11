<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membership extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'member_id',
        'membership_package_id',
        'tanggal_mulai',
        'tanggal_berakhir',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function membershipPackage()
    {
        return $this->belongsTo(MembershipPackage::class);
    }
}
