<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreOrderTypeRequest;
use App\Http\Requests\UpdateOrderTypeRequest;
use App\Models\OrderType;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderTypeResource;
use App\Http\Resources\OrderTypeCollection;

class OrderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): OrderTypeCollection
    {
        return new OrderTypeCollection(OrderType::paginate(5));
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
    public function store(StoreOrderTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderType $orderType): OrderTypeResource
    {
        return new OrderTypeResource($orderType);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderType $orderType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderTypeRequest $request, OrderType $orderType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderType $orderType)
    {
        //
    }
}
