<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'name',
        'account_id',
        'expense_category_id',
        'payment_method_id',
        'date',
        'ref',
        'amount',
        'attachment',
        'detail'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function expenseCategory()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
