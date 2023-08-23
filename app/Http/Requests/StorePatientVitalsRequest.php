<?php

namespace App\Http\Requests;

use App\Models\Clinic;
use Illuminate\Foundation\Http\FormRequest;

class StorePatientVitalsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'clinic_id' => 'required|numeric|exists:clinics,id',
            'doctor_id' => 'required|numeric|exists:doctors,id',
            'height' => 'nullable|min:0|max:300',
            'weight' => 'nullable|min:0|max:300',
            'pulseRate' => 'nullable|min:0|max:300',
            'temperature' => 'nullable|min:0|max:300',
            'bp_systolic' => 'nullable|min:0|max:300',
            'bloodSugar' => 'nullable|min:0|max:300',
            'respiratory' => 'nullable|min:0|max:300',
            'spo_two' => 'nullable|min:0|max:300',
            'bp_diastolic' => 'nullable|min:0|max:300',
            'head_circumference' => 'nullable|min:0|max:300',
            'urine' => 'nullable|min:0|max:300',
            'bmi' => 'nullable|min:0|max:300',
            'weight_status' => 'nullable|min:0|max:300',
            'datetime' => 'required'
        ];
    }
}
