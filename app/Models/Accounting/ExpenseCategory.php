<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
