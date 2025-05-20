<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
