<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderType;

class OrderTypeSeeder extends Seeder {
    public function run(): void {
        OrderType::factory()
            ->count(2)
            ->create();
    }
}
