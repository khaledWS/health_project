<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientSoapResource extends JsonResource
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
            'code' => $this->diagnosis->code,
            'short_description' => $this->diagnosis->short_description,
            'subjective' => $this->subjective,
            'objective' => $this->objective,
            'plan' => $this->plan,
            'outcomes' => $this->outcomes,
            'prescriber' => $this->doctor->firstname . '' . $this->doctor->lastname,
            'date_time' => $this->created_at
        ];
    }
}
