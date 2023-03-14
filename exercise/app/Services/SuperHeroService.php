<?php

namespace App\Services;

use App\Http\Resources\SuperHeroCollection;
use App\Imports\SuperHeroImport;
use App\Repositorys\SuperHeroRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SuperHeroService implements SuperHeroServiceInterface
{
    private $superHeroRepository;

    public function __construct(SuperHeroRepositoryInterface $superHeroRepository)
    {
        $this->superHeroRepository = $superHeroRepository;
    }

    public function importCsv($file)
    {
        Excel::import(new SuperHeroImport(), Storage::disk('csv')->path($file));
    }

    public function getSuperheros($filters)
    {
        return new SuperHeroCollection($this->superHeroRepository->getSuperheros($filters));
    }
}
