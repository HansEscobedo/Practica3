<?php

namespace App\Http\Controllers;

use App\Models\Frameworks;
use App\Http\Requests\StoreFrameworksRequest;
use App\Http\Requests\UpdateFrameworksRequest;

class FrameworksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFrameworksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Frameworks $frameworks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFrameworksRequest $request, Frameworks $frameworks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frameworks $frameworks)
    {
        //
    }
}
