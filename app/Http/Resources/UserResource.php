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
        if($this->user_type_id == User::USER_TYPE_DOCTOR){
            $resourceData = [
                "id" =>  $this->id,
               "firstname" => $this->identity->firstname,
               "lastname"=> $this->identity->lastname,
               "email" => $this->email,
               "speciality" => $this->identity->specialty->name,
               "image"=>  "https://qlickhealth.com/admin/uploads/provider/1608636620_SSS.jpg",
               "type" => "Doctor",
               "type_id" => User::USER_TYPE_DOCTOR,
               "rules" => [1]
           ];
        }
        return $resourceData;
    }
}
