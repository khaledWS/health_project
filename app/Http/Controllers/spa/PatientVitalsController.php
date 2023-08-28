<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientVitalsRequest;
use App\Http\Resources\PatientVitalsCollection;
use App\Http\Traits\SpaResponseTrait;
use App\Services\PatientVitalsService;
use Exception;
use Illuminate\Http\Request;

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
    public function index(Request $request, string $patient_id): \Illuminate\Http\JsonResponse
    {
        $attributes = [
            'start' => $request->start,
            'length' => $request->length,
            'search_value' => $request->search_value,
            'order_by' => $request->order_by,
            'order_direction' => $request->order_direction
        ];
        $vitals = $this->patientVitalsService->paginatePatientVitals($patient_id, $attributes);

        $vitalsResource = new PatientVitalsCollection($vitals);
        return $this->successResponseWithData($vitalsResource);
    }


    /**
     * store
     *
     * @param  mixed $patient_id
     * @param  StorePatientVitalsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(string $patient_id, StorePatientVitalsRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $storeVitalsStatus = $this->patientVitalsService->storePatientVitals($patient_id, $data);
        if (!$storeVitalsStatus) {
            throw new Exception('error');
        }
        return $this->successResponse();
    }
}
