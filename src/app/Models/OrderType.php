<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    /** @use HasFactory<\Database\Factories\OrderTypeFactory> */
    use HasFactory;

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function workers() {
        return $this->belongsToMany(
            Worker::class,
            'worker_ex_order_type',
             'type_id',
             'worker_id');
    }
}
