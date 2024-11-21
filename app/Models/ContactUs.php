<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    public function login_name()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
