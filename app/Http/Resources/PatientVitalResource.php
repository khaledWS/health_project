<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientVitalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'temperature' => $this->temperature,
            'bp_systolic' => $this->bp_systolic,
            'bp_diastolic' => $this->bp_diastolic,
            'spo_two' => $this->spo_two,
            'bmi' => $this->bmi,
            'weight_status' => $this->weight_status,
            'datetime' => $this->datetime,
        ];
    }
}
