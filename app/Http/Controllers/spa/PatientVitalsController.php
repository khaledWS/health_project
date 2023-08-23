<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;
use App\Models\PatientVitals;
use App\Http\Requests\StorePatientVitalsRequest;
use App\Http\Requests\UpdatePatientVitalsRequest;
use App\Http\Traits\SpaResponseTrait;
use App\Services\PatientVitalsService;
use Exception;

class PatientVitalsController extends Controller
{
    use SpaResponseTrait;

    private $patientVitalsService;

    public function __construct(PatientVitalsService $patientVitalsService)
    {
        $this->patientVitalsService = $patientVitalsService;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * index
     *
     * @param  string $patient_id
     * @return \Illuminate\Http\JsonResponse;
     */
    public function index(string $patient_id)
    {
      $vitalsPaginate = $this->patientVitalsService->paginatePatientVitals($patient_id);
        return $this->successResponseWithData($vitalsPaginate);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(string $patient_id, StorePatientVitalsRequest $request)
    {
        $data = $request->validated();
        $storeVitalsStatus = $this->patientVitalsService->storePatientVitals($patient_id, $data);
        if(!$storeVitalsStatus) {
            throw new Exception('error');
        }
        return $this->successResponse();
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientVitals $patientVitals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientVitalsRequest $request, PatientVitals $patientVitals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientVitals $patientVitals)
    {
        //
    }
}
