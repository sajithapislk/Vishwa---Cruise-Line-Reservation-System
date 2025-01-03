<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempDeal extends Model
{
    use HasFactory;
    protected $fillable = [
        'ur_id',
        'payment_id',
        'selected_rooms'
    ];
    protected $casts = [
        'selected_rooms' => 'array'
    ];
}
