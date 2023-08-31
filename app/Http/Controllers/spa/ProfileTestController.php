<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;
use App\Http\Traits\SpaResponseTrait;
use App\Models\ProfileTest;
use App\Http\Requests\StoreProfileTestRequest;
use App\Http\Requests\UpdateProfileTestRequest;
use App\Services\ProfileTestService;

class ProfileTestController extends Controller
{
    use SpaResponseTrait;



    public function __construct(private ProfileTestService $testService)
    {
    }
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
    public function store(StoreProfileTestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfileTest $profileTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileTest $profileTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileTestRequest $request, ProfileTest $profileTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileTest $profileTest)
    {
        //
    }
}
