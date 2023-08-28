<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PatientVitalsCollection extends ResourceCollection
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
            'data' => $this->collection['vitals']->map(function ($vital) {
                return new PatientVitalResource($vital);
            }),
            'meta' => [
                'total_vitals' => $this->collection['vitals_count'],
            ],
        ];
    }
}
