<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingDeal extends Model
{
    use HasFactory;
    protected $fillable = [
        's_id',
        'dp_id',
        'p_id',
        'name',
        'description',
        'img',
        'tax',
        'depart_at',
        'arrive_at',
    ];
}
