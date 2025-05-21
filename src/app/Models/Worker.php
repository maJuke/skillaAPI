<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model {
    /** @use HasFactory<\Database\Factories\WorkerFactory> */
    use HasFactory;

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function exOrderTypes() {
        return $this->belongsToMany(
            OrderType::class,
             'worker_ex_order_type',
            'worker_id',
        'type_id');
    }
}
