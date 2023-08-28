<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;

use App\Models\TestCategory;
use App\Http\Requests\StoreTestCategoryRequest;
use App\Http\Requests\UpdateTestCategoryRequest;

class TestCategoryController extends Controller
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
    public function store(StoreTestCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TestCategory $testCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestCategory $testCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestCategoryRequest $request, TestCategory $testCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestCategory $testCategory)
    {
        //
    }
}
