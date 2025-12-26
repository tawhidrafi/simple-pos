<?php

namespace App\Models\Sale;

use App\Models\Contact\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'customer_id',
        'date',
        'total',
        'delivery_status',
        'status',
        'created_by',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function saleReturn()
    {
        return $this->hasOne(SaleReturn::class);
    }

    public static function generateInvoiceNumber()
    {
        $latestInvoice = self::latest()->first();
        $invoiceNumber = 'Sale-' . date('Ymd') . '-';

        if ($latestInvoice) {
            $lastNumber = (int) substr($latestInvoice->invoice_number, -3);
            $invoiceNumber .= str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $invoiceNumber .= '001';
        }

        return $invoiceNumber;
    }

    public static function getSingleSale($id)
    {
        return self::with(['saleItems.product', 'saleItems.variant', 'saleReturn'])->findOrFail($id);
    }

    public function isDelivered(): bool
    {
        return $this->delivery_status === 'delivered';
    }

    public function canBeReturned(): bool
    {
        return $this->saleReturn === null;
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }
}
