<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this->call([
            PartnershipSeeder::class,
            UserSeeder::class,
            WorkerSeeder::class,
            OrderTypeSeeder::class,
            OrderSeeder::class,
            OrderWorkerSeeder::class,
            WorkerExOrderTypeSeeder::class,
        ]);
    }
}
