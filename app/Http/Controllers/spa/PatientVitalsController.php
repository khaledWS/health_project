<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;
use App\Models\PatientVitals;
use App\Http\Requests\StorePatientVitalsRequest;
use App\Http\Requests\UpdatePatientVitalsRequest;
use App\Http\Traits\SpaResponseTrait;
use App\Services\PatientVitalsService;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientVitalsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientVitals $patientVitals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientVitals $patientVitals)
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
