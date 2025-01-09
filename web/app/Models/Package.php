<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        's_id',
        'is_d',
        'is_bl',
        'is_en',
        'is_c',
        'is_ona',
        'is_outa',
        'is_kt',
        'is_w',
        'is_s',
    ];
    public function upcomingReservations()
    {
        return $this->hasMany(UpcomingReservations::class, 'p_id');
    }
}
