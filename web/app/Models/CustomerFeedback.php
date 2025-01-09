<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'b_id',
        'user_id',
        'comment',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'b_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
