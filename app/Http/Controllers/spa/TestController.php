<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;


use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Http\Traits\SpaResponseTrait;
use App\Services\TestService;

class TestController extends Controller
{
    use SpaResponseTrait;

    

    public function __construct(private TestService $testService)
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
    public function store(StoreTestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestRequest $request, )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }


    public function getCategoryTests(string $category_id)
    {
        $tests = $this->testService->getCategoryTests($category_id);
        return $this->successResponseWithData($tests);
    }
}
