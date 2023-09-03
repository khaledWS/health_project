<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PatientCarePlanCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection['data']->map(function ($soap) {
                return new PatientCarePlanResource($soap);
            }),
            'meta' => [
                'count' => $this->collection['count'],
            ],
        ];
    }
}
