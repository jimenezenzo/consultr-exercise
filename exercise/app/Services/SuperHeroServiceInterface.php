<?php

namespace App\Services;

interface SuperHeroServiceInterface
{
    public function importCsv($file);
    public function getSuperheros($filters);
}
