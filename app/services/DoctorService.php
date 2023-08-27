<?php

namespace App\services;

use App\Repositories\DoctorRepository;

class DoctorService{

    protected $DoctorRepository;

    public function __construct(DoctorRepository $DoctorRepository)
    {
        $this->DoctorRepository = $DoctorRepository;
    }


    public function getDoctorsCollection(){
        return $this->DoctorRepository->all();
    }
}
