<?php

namespace App\Models\Purchase;

use App\Models\Contact\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'supplier_id',
        'date',
        'total',
        'paid_amount',
        'due_amount',
        'payment_status',
        'delivery_status',
        'status',
        'created_by',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function purchaseReturn()
    {
        return $this->hasOne(PurchaseReturn::class);
    }

    public function purchasePayments()
    {
        return $this->hasMany(PurchasePayment::class);
    }

    public static function generateInvoiceNumber()
    {
        $latestInvoice = self::latest()->first();
        $invoiceNumber = 'PUR-' . date('Ymd') . '-';

        if ($latestInvoice) {
            $lastNumber = (int) substr($latestInvoice->invoice_number, -3);
            $invoiceNumber .= str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $invoiceNumber .= '001';
        }

        return $invoiceNumber;
    }

    public static function getAllPurchase()
    {
        return self::all();
    }

    public function getSinglePurchase()
    {
        return self::with([
            'purchaseItems.product',
            'purchaseItems.variant',
            'purchaseReturn',
            'purchasePayments.paymentMethod'
        ])->findOrFail($this->id);
    }

    public function isPaid(): bool
    {
        return $this->due_amount == 0;
    }

    public function isDelivered(): bool
    {
        return $this->delivery_status === 'delivered';
    }

    public function canBeReturned(): bool
    {
        return $this->purchaseReturn === null;
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }
}
