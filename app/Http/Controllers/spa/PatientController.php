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
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $attributes = [
            'start' => $request->start,
            'length' => $request->length,
            'search_value' => $request->search_value,
            'order_by' => $request->order_by,
            'order_direction' => $request->order_direction
        ];
        $patients = $this->patientService->PaginatePatients($attributes);
        $patientsResourceCollection = new PatientsResource($patients);
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
    
    /**
     * get_single_tests
     *
     * @param  Request $request
     * @param  string $patient_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_single_tests(Request $request, string $patient_id): \Illuminate\Http\JsonResponse
    {
        $attributes = [
            'start' => $request->start,
            'length' => $request->length,
            'search_value' => $request->search_value,
            'order_by' => $request->order_by,
            'order_direction' => $request->order_direction
        ];

        $tests = $this->patientService->paginatePatientSingleTests($patient_id, $attributes);

        $singleTestsResource = new PatientSingleTestsCollection($tests);
        return $this->successResponseWithData($singleTestsResource);

    }
}
