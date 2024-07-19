<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuestas extends Model
{
    use HasFactory;
    protected $fillable = ['question','options'];

    protected $casts = [
        'options' => 'array',
    ];
}
