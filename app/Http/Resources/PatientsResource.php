<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PatientsResource extends ResourceCollection
{
    public static $wrap = null;
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection['patients']->map(function ($patient) {
                return new PatientResource($patient);
            }),
            'meta' => [
                'total_posts' => $this->collection['patients_count'],
            ],
        ];
    }
}
