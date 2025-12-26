<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'login_time', 'ip_address', 'user_agent'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
