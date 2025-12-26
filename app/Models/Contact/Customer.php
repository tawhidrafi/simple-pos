<?php

namespace App\Models\Contact;

use App\Models\Sale\Sale;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'address',
        'status',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function getAllCustomers()
    {
        return self::all();
    }

    public function totalSaleAmount()
    {
        return $this->sales()->sum('total');
    }

    public function totalSales()
    {
        return $this->sales()->count();
    }
}
