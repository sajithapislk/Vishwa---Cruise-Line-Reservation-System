<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CruiseShipRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        's_id',
        'room_view',
        'img',
        'flow',
        'room_count',
    ];
}
