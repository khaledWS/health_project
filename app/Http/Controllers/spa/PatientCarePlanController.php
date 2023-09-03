<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;
use App\Models\PatientCarePlan;
use App\Http\Requests\StorePatientCarePlanRequest;
use App\Http\Requests\UpdatePatientCarePlanRequest;
use App\Http\Resources\PatientCarePlanCollectionResource;
use App\Http\Traits\SpaPaginationTrait;
use App\Http\Traits\SpaResponseTrait;
use App\Services\PatientCarePlanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PatientCarePlanController extends Controller
{
    use SpaResponseTrait, SpaPaginationTrait;

    private $PatientCarePlanService;

    public function __construct(PatientCarePlanService $PatientCarePlanService)
    {
        $this->PatientCarePlanService = $PatientCarePlanService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(string $patient_id, Request $request): JsonResponse
    {
        $paginationAttributes = $this->collectPaginationAttributes($request);

        $carePlansPaginated = $this->PatientCarePlanService->paginatePatientSoap($patient_id, $paginationAttributes);

        $carePlanPaginatedResource = new PatientCarePlanCollectionResource($carePlansPaginated);

        return  $this->successResponseWithData($carePlanPaginatedResource);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $patient_id, StorePatientCarePlanRequest $request): JsonResponse
    {
        $data = $request->validated();

        $carePlan = $this->PatientCarePlanService->storePatientCarePlan($patient_id, $data);

        if (!$carePlan) {
            throw new \Exception('error');
        }

        return $this->successCreatedResponse($carePlan);
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientCarePlan $patientCarePlan)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientCarePlanRequest $request, PatientCarePlan $patientCarePlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientCarePlan $patientCarePlan)
    {
        //
    }
}
