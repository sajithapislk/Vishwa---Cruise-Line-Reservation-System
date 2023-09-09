<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'ud_id',
        'is_booked',
    ];
}