<?php

namespace App\Models\Purchase;

use App\Models\Accounting\PaymentMethod;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'payment_method_id',
        'paid_amount',
        'created_by'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
}
