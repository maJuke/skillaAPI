<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable {
    use HasFactory, Notifiable, HasApiTokens;

    public function partnership() {
        return $this->belongsTo(Partnership::class);
    }
}
