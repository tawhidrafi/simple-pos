<?php

namespace App\Models\Purchase;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'purchase_id',
        'date',
        'total',
        'status',
        'created_by',
    ];

    public static function generateInvoiceNumber()
    {
        $latestInvoice = self::latest()->first();
        $invoiceNumber = 'PUR-RE-' . date('Ymd') . '-';

        if ($latestInvoice) {
            $lastNumber = (int) substr($latestInvoice->invoice_number, -3);
            $invoiceNumber .= str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $invoiceNumber .= '001';
        }

        return $invoiceNumber;
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function purchaseReturnItems()
    {
        return $this->hasMany(PurchaseReturnItem::class);
    }

    public static function getSinglePurchaseReturn($id)
    {
        return self::with(['purchaseReturnItems.product', 'purchaseReturnItems.variant', 'purchase.supplier'])->findOrFail($id);
    }
}
