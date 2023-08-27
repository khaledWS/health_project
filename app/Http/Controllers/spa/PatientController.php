<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Resources\PatientResource;
use App\Http\Resources\PatientsResource;
use App\Http\Traits\SpaResponseTrait;
use App\Services\PatientService;

class PatientController extends Controller
{
    use SpaResponseTrait;

    private $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = $this->patientService->PaginatePatients();
        dd($patients);
        $patientsResourceCollection = PatientsResource::collection($patients);
        return  $this->successResponseWithData($patientsResourceCollection);
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
    public function store(StorePatientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $patient_id)
    {
        $patient = $this->patientService->showPatient($patient_id);
        $patientResource  = new PatientResource($patient);
        return  $this->successResponseWithData($patientResource);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function getVitals(string $patient_id){

    }
}
