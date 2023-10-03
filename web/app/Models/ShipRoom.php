<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        's_id',
        'room_view',
        'img',
        'room_count',
    ];
}
