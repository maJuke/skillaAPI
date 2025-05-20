<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    public function partnership() {
        return $this->belongsTo(Partnership::class);
    }

    public function orderType() {
        return $this->belongsTo(OrderType::class);
    }

    public function workers() {
        return $this->belongsToMany(Worker::class);
    }
}
