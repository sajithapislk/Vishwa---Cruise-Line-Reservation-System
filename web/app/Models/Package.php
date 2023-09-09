<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
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
}
