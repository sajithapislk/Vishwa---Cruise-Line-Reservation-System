<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UpcomingReservations extends Model
{
    use HasFactory;
    protected $fillable = [
        's_id',
        'sr_id',
        'dp_id',
        'ap_id',
        'p_id',
        'name',
        'description',
        'img',
        'tax',
        'price',
        'depart_at',
        'arrive_at',
    ];
    public function ship(): HasOne
    {
        return $this->hasOne(CruiseShip::class,'id','s_id');
    }
    public function package(): HasOne
    {
        return $this->hasOne(Package::class,'id','p_id');
    }
    public function departure_port(): HasOne
    {
        return $this->hasOne(Port::class,'id','dp_id');
    }
    public function arrival_port(): HasOne
    {
        return $this->hasOne(Port::class,'id','ap_id');
    }
    public function room(): HasOne
    {
        return $this->hasOne(CruiseShipRoom::class,'id','sr_id');
    }

    public function deals(): HasMany
    {
        return $this->hasMany(Books::class,'ur_id','id');
    }
}
