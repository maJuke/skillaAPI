<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use App\Models\Worker;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkerResource;
use App\Http\Resources\WorkerCollection;
use App\Services\WorkerFilterService;
use Illuminate\Http\Request;

class WorkerController extends Controller
{

    private $workerFilterService;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new WorkerCollection(Worker::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        return new WorkerResource($worker);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkerRequest $request, Worker $worker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        //
    }

    public function workersForExactOrderTypes(Request $request, WorkerFilterService $workerFilterService) {

        $typeIds = $request->input("typeIds", []);

        return response()->json($workerFilterService->getWorkersAvailableToOrderTypes($typeIds));
    }
}
