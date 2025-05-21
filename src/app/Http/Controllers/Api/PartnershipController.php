<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePartnershipRequest;
use App\Http\Requests\UpdatePartnershipRequest;
use App\Models\Partnership;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartnershipResource;
use App\Http\Resources\PartnershipCollection;

class PartnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PartnershipCollection(Partnership::all());
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
    public function store(StorePartnershipRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Partnership $partnership)
    {
        return new PartnershipResource($partnership);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partnership $partnership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnershipRequest $request, Partnership $partnership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partnership $partnership)
    {
        //
    }
}
