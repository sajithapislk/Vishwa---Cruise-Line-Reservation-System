<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CruiseCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'img',
        'tp'
    ];

    public function ships(): HasMany
    {
        return $this->hasMany(CruiseLine::class,'cl_id','id');
    }
}
