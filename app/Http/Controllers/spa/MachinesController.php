<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;

use App\Models\machines;
use App\Http\Requests\StoremachinesRequest;
use App\Http\Requests\UpdatemachinesRequest;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoremachinesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(machines $machines)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(machines $machines)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemachinesRequest $request, machines $machines)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(machines $machines)
    {
        //
    }
}
