<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" =>  $this->id,
            "name"=> $this->fistname .'' . $this->lastname ,
            "email"=> $this->user->email,
            "phone"=> $this->user->phone,
            "national_id"=> $this->user->national_id,
            "links"=> ["autism", "assessment"],
            "dob"=> $this->date_of_birth ,
            "address"=> $this->address,
            "age"=> Carbon::parse($this->date_of_birth)->age,
            "gender"=> $this->gender == 1 ? 'male' : 'female',
            // "autism"=> "Yes",
            // "description"=> "Autism Patient",
            // "class"=> "fifth",
            // "elementarySchool"=> "test school1",
            // "middleSchool"=> "test school2",
            // "hightSchool"=> "test school3",
            // "seniorSchool"=> "test school4",
            // "medicalStatus"=> ["asthma", "diabetes"],
            // "father"=> "father name",
            // "mother"=> "mother name",
            "image"=> "https://qlickhealth.com/admin/uploads/user/1663844341_temp_file_20220922_135827.jpg"
        ];
    }
}
