<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientCarePlanResource extends JsonResource
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
            'doctor' => $this->doctor->firstname .' '. $this->doctor->lastname,
            'assessment' => $this->assessment,
            'nursing_diagnosis' => $this->nursing_diagnosis,
            'goals_outcomes' => $this->goals_outcomes,
            'nursing_interventions' => $this->nursing_interventions,
            'rationale' => $this->rationale,
            'evaluations' => $this->evaluations,
            'date_time' => $this->created_at,
        ];
    }
}
