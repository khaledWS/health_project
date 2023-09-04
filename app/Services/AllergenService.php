<?php

namespace App\Services;


use App\Repositories\AllergenRepository;


class AllergenService
{

    protected $AllergenRepository;

    public function __construct(AllergenRepository $AllergenRepository)
    {
        $this->AllergenRepository = $AllergenRepository;
    }

    public function getAllergensByType(string $type) : \Illuminate\Support\Collection
    {

        return $this->AllergenRepository->getAllergensByType($type);
    }
}
