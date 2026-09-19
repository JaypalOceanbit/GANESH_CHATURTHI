<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCollection extends Model
{
    use HasFactory;

    protected $table = 'students_collections';

    protected $fillable = [
        'name',
        'room',
        'amount',
        'is_group',
        'group_members',
        'collection_date',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'is_group' => 'boolean',
        'collection_date' => 'date',
    ];
}
