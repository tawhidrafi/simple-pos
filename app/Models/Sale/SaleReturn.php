<?php

namespace App\Models\Sale;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'sale_id',
        'date',
        'total',
        'status',
        'created_by',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function saleReturnItems()
    {
        return $this->hasMany(SaleReturnItem::class);
    }

    public static function generateInvoiceNumber()
    {
        $latestInvoice = self::latest()->first();
        $invoiceNumber = 'SALE-RE-' . date('Ymd') . '-';

        if ($latestInvoice) {
            $lastNumber = (int) substr($latestInvoice->invoice_number, -3);
            $invoiceNumber .= str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $invoiceNumber .= '001';
        }

        return $invoiceNumber;
    }

    public static function getSingleSaleReturn($id)
    {
        return self::with(['saleReturnItems.product', 'saleReturnItems.variant', 'sale.customer'])->findOrFail($id);
    }
}
