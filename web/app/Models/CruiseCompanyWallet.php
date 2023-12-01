<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CruiseCompanyWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'name',
        'debit',
        'credit',
    ];
}
