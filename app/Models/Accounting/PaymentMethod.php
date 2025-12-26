<?php

namespace App\Models\Accounting;

use App\Models\Purchase\PurchasePayment;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'name'
    ];

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function purchasePayments()
    {
        return $this->hasMany(PurchasePayment::class);
    }
}
