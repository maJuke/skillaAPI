<?php

namespace App\Services;

use App\Models\Worker;
use App\Models\Order;
use Illuminate\Validation\ValidationException;

class AssignWorkerToOrderService {
    public function assign(int $orderId, int $workerId, array $pivotTableData) {
        $order = Order::findOrFail($orderId);
        $worker = Worker::findOrFail($workerId);

        $isExcluded = $worker
            ->exOrderTypes()
            ->where('type_id', $order->type_id)
            ->exists();

        if ($isExcluded) {
            throw ValidationException::withMessages([
                'worker_id' => ['Worker has declined this order type.']
            ]);
        }

        $order->workers()->syncWithoutDetaching([
            $worker->id => $pivotTableData
        ]);

        return $order;
    }
}
