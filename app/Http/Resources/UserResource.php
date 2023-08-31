<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $resourceData = [];
        if ($this->user_type_id == User::USER_TYPE_DOCTOR) {
            $resourceData = [
                "id" =>  $this->id,
                "firstname" => $this->identity->firstname,
                "lastname" => $this->identity->lastname,
                "email" => $this->email,
                "speciality" => $this->identity->specialty->name,
                "image" =>  "https://qlickhealth.com/admin/uploads/provider/1608636620_SSS.jpg",
                "type" => "Doctor",
                "type_id" => User::USER_TYPE_DOCTOR,
                "rules" => [1]
            ];
        }
        if ($this->user_type_id == User::USER_TYPE_STAFF) {
            $resourceData = [
                "id" =>  $this->id,
                "firstname" => $this->identity->firstname,
                "lastname" => $this->identity->lastname,
                "email" => $this->email,
                "speciality" => 'staff',
                "image" =>  "https://qlickhealth.com/admin/uploads/user/1610265165_cropped8625811454323105144.jpg",
                //    "type" => "Doctor",
                "type_id" => User::USER_TYPE_STAFF,
                //    "rules" => [1]
            ];
            if ($this->identity->staff_type_id == 1) {
                $additonal_data = [
                    "type" => "Nurse",
                    "rules" => [2]
                ];
                $resourceData = array_merge($resourceData, $additonal_data);
            } elseif ($this->identity->staff_type_id == 2) {
                $additonal_data = [
                    "type" => "Reception",
                    "rules" => [3]
                ];
                $resourceData = array_merge($resourceData, $additonal_data);
            }
        }
        if ($this->user_type_id == User::USER_TYPE_Facility_Administrator) {
            $resourceData = [
                "id" =>  $this->id,
                "firstname" => $this->identity->firstname,
                "lastname" => $this->identity->lastname,
                "email" => $this->email,
                "speciality" => 'Hospital',
                "image" =>  "https://qlickhealth.com/admin/uploads/provider/1605003750_download_(4).jpg",
                   "type" => "Hospital",
                "type_id" => User::USER_TYPE_Facility_Administrator,
                "rules" => [4]
            ];
        }
        return $resourceData;
    }
}
