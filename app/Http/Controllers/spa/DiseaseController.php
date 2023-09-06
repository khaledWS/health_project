<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiseaseRequest;
use App\Http\Requests\UpdateDiseaseRequest;
use App\Http\Traits\SpaPaginationTrait;
use App\Http\Traits\SpaResponseTrait;
use App\Services\DiseaseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    use SpaResponseTrait, SpaPaginationTrait;

    public function __construct(private DiseaseService $service)
    {
        
    }

    public function getTypes(): JsonResponse
    {
        $types =  $this->service->getTypes();

        return $this->successResponseWithData($types);
    }

    public function getDiseasesFilterByType(Request $request): JsonResponse
    {
        $disease_type = $request->type;

        $diseases = $this->service->getDiseaseByType($disease_type);

        return $this->successResponseWithData($diseases);
    }

}
