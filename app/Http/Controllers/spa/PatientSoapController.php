<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;
use App\Models\PatientSoap;
use App\Http\Requests\StorePatientSoapRequest;
use App\Http\Requests\UpdatePatientSoapRequest;
use App\Http\Resources\PatientSoapCollectionResource;
use App\Http\Traits\SpaPaginationTrait;
use App\Http\Traits\SpaResponseTrait;
use App\Services\PatientSoapService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PatientSoapController extends Controller
{
    use SpaResponseTrait, SpaPaginationTrait;

    private $PatientSoapService;

    public function __construct(PatientSoapService $PatientSoapService)
    {
        $this->PatientSoapService = $PatientSoapService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(string $patient_id, Request $request): JsonResponse
    {
        $paginationAttributes = $this->collectPaginationAttributes($request);

        $soapPaginated = $this->PatientSoapService->paginatePatientSoap($patient_id, $paginationAttributes);

        $soapResourceCollection = new PatientSoapCollectionResource($soapPaginated);

        return  $this->successResponseWithData($soapResourceCollection);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(string $patient_id, StorePatientSoapRequest $request): JsonResponse
    {
        $data = $request->validated();

        $soap = $this->PatientSoapService->storePatientSoap($patient_id, $data);

        if (!$soap) {
            throw new Exception('error');
        }

        return $this->successCreatedResponse($soap);
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientSoap $patientSoap)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientSoapRequest $request, PatientSoap $patientSoap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientSoap $patientSoap)
    {
        //
    }
}
