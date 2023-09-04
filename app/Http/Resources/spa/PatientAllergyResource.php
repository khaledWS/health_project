<?php

namespace App\Http\Resources\spa;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientAllergyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'Date' => $this->created_at,
            'type' => $this->allergy->title,
            'allergen' => $this->allergen->title,
            'severity' => $this->severity->title,
            'reaction' => $this->reaction,
            'doctor' => $this->doctor->firstname . ' ' . $this->doctor->lastname
        ];
    }
}
