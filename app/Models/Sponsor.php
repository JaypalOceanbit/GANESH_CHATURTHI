<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $table = 'sponsors';

    protected $fillable = [
        'name',
        'sponsor_item',
        'sponsor_date',
        'notes',
    ];

    protected $casts = [
        'sponsor_date' => 'date',
    ];
}
