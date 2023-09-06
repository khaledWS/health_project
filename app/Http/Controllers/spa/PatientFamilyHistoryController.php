<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Storepatient_family_historyRequest;
use App\Http\Requests\Updatepatient_family_historyRequest;
use App\Http\Resources\spa\PaginationCollectionResource;
use App\Http\Traits\SpaPaginationTrait;
use App\Http\Traits\SpaResponseTrait;
use App\Services\PatientFamilyHistoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PatientFamilyHistoryController extends Controller
{
    use SpaResponseTrait, SpaPaginationTrait;

    private $PatientFamilyHistoryService;

    public function __construct(PatientFamilyHistoryService $PatientFamilyHistoryService)
    {
        $this->PatientFamilyHistoryService = $PatientFamilyHistoryService;
    }

    public function index(string $patient_id, Request $request): JsonResponse
    {
        $paginationAttributes = $this->collectPaginationAttributes($request);

        $patientFamilyHistory = $this->PatientFamilyHistoryService->paginatePatientFamilyHistory($patient_id, $paginationAttributes);

        $patientFamilyHistoryPaginatedResource = new PaginationCollectionResource($patientFamilyHistory);

        return  $this->successResponseWithData($patientFamilyHistoryPaginatedResource);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storepatient_family_historyRequest $request, string $patient_id): JsonResponse
    {
        $data = $request->validated();

        $familyHistory = $this->PatientFamilyHistoryService->storePatientFamilyHistory($patient_id, $data);

        if (!$familyHistory) {
            throw new \Exception('error');
        }

        return $this->successCreatedResponse($familyHistory);
    }
}
