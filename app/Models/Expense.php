<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $fillable = [
        'expense_date',
        'product_name',
        'category_id',
        'price',
        'bill_image',
        'notes',
    ];

    protected $casts = [
        'expense_date' => 'date',
        'price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ExpenseCategory::class, 'category_id');
    }
}
