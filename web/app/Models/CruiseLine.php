<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CruiseLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'cl_id',
        'type_id',
        'name',
        'description',
        'img',
        'style',
        'size',
        'type',
        'launch_at',
        'last_refit_at',
        'gt',
        'length',
        'width',
        'speed',
        'decks',
        'nop',
        'no_crew',
        'no_cabins',
        'wa',
    ];
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class,'s_id','id');
    }
}
