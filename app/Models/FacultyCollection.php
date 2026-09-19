<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyCollection extends Model
{
    use HasFactory;

    protected $table = 'faculty_collections';

    protected $fillable = [
        'name',
        'amount',
        'sponsor',
        'collection_date',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'collection_date' => 'date',
    ];
}
