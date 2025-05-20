<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Worker;

class OrderWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $orders = Order::all();
        $workers = Worker::all();

        foreach ($orders as $order) {
            $randomWorkers = $workers->random(rand(1, 20));
            $attachData = [];

            foreach ($randomWorkers as $worker) {
                $attachData[$worker->id] = [
                    'amount' => rand(1, 20),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            $order->workers()->attach($attachData);
        }
    }
}
