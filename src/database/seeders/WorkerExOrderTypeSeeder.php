<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderType;
use App\Models\Worker;

class WorkerExOrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderTypes = OrderType::all();
        $workers = Worker::all();

        foreach ($orderTypes as $type) {
            $randomWorkers = $workers->random(rand(1, 2));
            $attachData = [];

            foreach ($randomWorkers as $worker) {
                $attachData[$worker->id] = [
                    'created_at' => now(),
                    'updated_at' => null,
                ];
            }

            $type->workers()->attach($attachData);
        }
    }
}
