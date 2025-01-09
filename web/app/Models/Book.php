<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'ur_id',
        'user_id',
        'payment_id',
        'status',
        'booked_rooms'
    ];
    public function reservation(): HasOne
    {
        return $this->hasOne(UpcomingReservations::class,'id','ur_id');
    }
    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class,'id','payment_id');
    }
    public function feedbacks()
    {
        return $this->hasMany(CustomerFeedback::class, 'b_id');
    }
}
