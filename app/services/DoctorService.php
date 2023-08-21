<?php

namespace App\Services;

use App\Repository\DoctorRepositoryInterface;

class DoctorService{

    protected $DoctorRepository;

    public function __construct(DoctorRepositoryInterface $DoctorRepository)
    {
        $this->DoctorRepository = $DoctorRepository;
    }


    public function getDoctorsCollection(){
        return $this->DoctorRepository->all();
    }
}
