<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'operand1',
        'operator',
        'operand2',
        'result',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
