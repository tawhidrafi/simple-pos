<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'account_name',
        'account_number',
        'balance',
        'details'
    ];

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
