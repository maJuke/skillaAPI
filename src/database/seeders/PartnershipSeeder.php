<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partnership;

class PartnershipSeeder extends Seeder {
    public function run(): void {
        Partnership::factory()
            ->count(10)
            ->create();
    }
}
