<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientAllergyRequest;
use App\Http\Requests\UpdatePatientAllergyRequest;
use App\Http\Resources\spa\PaginationCollectionResource;
use App\Http\Traits\SpaPaginationTrait;
use App\Http\Traits\SpaResponseTrait;
use App\Services\PatientAllergyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PatientAllergyController extends Controller
{
    use SpaResponseTrait, SpaPaginationTrait;

    private $PatientAllergyService;

    public function __construct(PatientAllergyService $PatientAllergyService)
    {
        $this->PatientAllergyService = $PatientAllergyService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $patient_id): JsonResponse
    {
        $paginationAttributes = $this->collectPaginationAttributes($request);

        $carePlansPaginated = $this->PatientAllergyService->paginatePatientAllergies($patient_id, $paginationAttributes);

        $carePlanPaginatedResource = new PaginationCollectionResource($carePlansPaginated);

        return  $this->successResponseWithData($carePlanPaginatedResource);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientAllergyRequest $request, string $patient_id)
    {
        $data = $request->validated();

        $allergy = $this->PatientAllergyService->storePatientAllergy($patient_id, $data);

        if (!$allergy) {
            throw new \Exception('error');
        }

        return $this->successCreatedResponse($allergy);
    }
}
