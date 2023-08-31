<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;


use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Http\Traits\SpaResponseTrait;
use App\Models\Const_Test_Types;
use App\Services\ProfileTestService;
use App\Services\TestService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
    public function update(UpdateTestRequest $request,)
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


    public function getCategoryTests(string $category_id): JsonResponse
    {
        $tests = $this->testService->getCategoryTests($category_id);
        return $this->successResponseWithData($tests);
    }

    public function getTypes(): JsonResponse
    {
        $testTypes = $this->testService->getTestTypes();
        return $this->successResponseWithData($testTypes);
    }

    public function getTypeTests(Request $request): JsonResponse
    {
        $type = $request->type;
        $data = collect();
        if($type == Const_Test_Types::TYPE_PROFILE){
            $data =   app()->make(ProfileTestService::class)->all();
        }elseif($type == Const_Test_Types::TYPE_SINGLE){
            $data =   $this->testService->getTests();
        }elseif($type == Const_Test_Types::TYPE_MACHINE){
        }
        return $this->successResponseWithData($data);
    }

    
}
