<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempDeal extends Model
{
    use HasFactory;
    protected $fillable = [
        'ud_id',
        'payment_id'
    ];
}
