<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'name',
        'account_id',
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

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
