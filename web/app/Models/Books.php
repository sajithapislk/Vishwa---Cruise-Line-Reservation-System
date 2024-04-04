<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'ur_id',
        'ar_id',
        'user_id',
        'payment_id',
        'status'
    ];
    public function deal(): HasOne
    {
        return $this->hasOne(UpcomingReservations::class,'id','ur_id');
    }
    public function available_room(): HasOne
    {
        return $this->hasOne(AvailableRoom::class,'id','ar_id');
    }
    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class,'id','payment_id');
    }
}
