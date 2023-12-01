<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CruiseCompanyPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'method',
        'ref',
        'amount',
        'img',
    ];
}
