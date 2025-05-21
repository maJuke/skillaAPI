<?php

namespace App\Services;

use App\Models\Worker;

class WorkerFilterService {

    /**
     * Returns an array of workers
     * who are agreed to complete
     * exact types of orders
     * @param array $typeIds
     * @return \Illuminate\Database\Eloquent\Collection<int, Worker>
     */
    public function getWorkersAvailableToOrderTypes(array $typeIds) {
        return Worker::where(function ($query) use ($typeIds) {
            foreach ($typeIds as $typeId) {
                $query->orWhereDoesntHave('exOrderTypes', function ($q) use ($typeId) {
                    $q->where('type_id', $typeId);
                });
            }
        })->get();
    }
}
