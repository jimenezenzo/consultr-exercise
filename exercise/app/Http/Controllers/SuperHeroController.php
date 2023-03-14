<?php

namespace App\Http\Controllers;

use App\Services\SuperHeroServiceInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class SuperHeroController extends Controller
{
    private $superHeroService;

    public function __construct(SuperHeroServiceInterface $superHeroService)
    {
        $this->superHeroService = $superHeroService;
    }
    public function importCsv()
    {
        try {
            $this->superHeroService->importCsv('superheros.csv');

            return response()->json([
                'message' => 'successfully created'
            ], Response::HTTP_CREATED);
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => 'There was an error importing the file'
            ], Response::HTTP_CONFLICT);
        }
    }

    public function getSuperheros(Request $request)
    {
        $validate = $request->validate([
            'name' =>'alpha',
            'race' => 'alpha',
            'publisher' => 'alpha'
        ]);

        return $this->superHeroService->getSuperheros($validate);
    }
}
