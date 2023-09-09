<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CruiseDeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'ud_id',
        'ar_id',
        'user_id',
        'payment_id',
        'status',
        'price'
    ];
}
