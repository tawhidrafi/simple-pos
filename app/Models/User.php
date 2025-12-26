<?php

namespace App\Models;

use App\Models\Admin\Role;
use App\Models\Contact\Customer;
use App\Models\Contact\Supplier;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'role_id',
        'email',
        'phone',
        'photo',
        'address',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function hasRole($role)
    {
        return $this->role && $this->role->name === $role;
    }


    public function hasAnyRole(array $roles)
    {
        return $this->role && in_array($this->role->name, $roles);
    }

    public function hasPermissionTo($permissionName)
    {
        return $this->role->permissions->contains('name', $permissionName);
    }
}
