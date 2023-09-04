<?php

namespace App\Http\Controllers\spa;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAllergenRequest;
use App\Http\Requests\UpdateAllergenRequest;
use App\Http\Traits\SpaResponseTrait;
use App\Services\AllergenService;
use Illuminate\Http\Request;

class AllergenController extends Controller
{
    use SpaResponseTrait;

    private $AllergenService;

    public function __construct(AllergenService $AllergenService)
    {
        $this->AllergenService = $AllergenService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreAllergenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAllergenRequest $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }


    public function getAllergen(Request $request)
    {
        $allergen_type = $request->type;
        $allergens =  $this->AllergenService->getAllergensByType($allergen_type);
        return $this->successResponseWithData($allergens);
    }
}
