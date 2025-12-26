<?php

namespace App\Models\Contact;

use App\Models\Purchase\Purchase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'address',
        'company',
        'tin',
        'status',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public static function getAllSuppliers()
    {
        return self::all();
    }

    public function totalDue()
    {
        return $this->purchases()->sum('due_amount');
    }

    public function incompletePurchases()
    {
        return $this->purchases()->where('due_amount', '>', 0)->count();
    }
}
