<?php

namespace App\Http\Controllers;

use App\Imports\SuperHeroImport;
use App\SuperHero;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;


class SuperHeroController extends Controller
{
    public function importCsv(Request $request)
    {
        $path = Storage::disk('csv')->path('superheros.csv');

        Excel::import(new SuperHeroImport(), $path);

        return response()->json([
            'message' => 'successfully created'
        ], Response::HTTP_CREATED);
    }

    public function getSuperheros(Request $request)
    {
        $name = $request->input('name');
        $race = $request->input('race');
        $publisher = $request->input('publisher');

        $superheros = SuperHero::when($name, function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->when($race, function ($query, $race) {
                return $query->whereHas('race', function (Builder $query) use ($race) {
                    $query->where('name', 'like', '%' . $race . '%');
                });
            })
            ->when($publisher, function ($query, $publisher) {
                return $query->whereHas('publisher', function (Builder $query) use ($publisher) {
                    $query->where('name', 'like', '%' . $publisher . '%');
                });
            })->get();

        return response()->json([
            'superheros' => $superheros
        ], Response::HTTP_ACCEPTED);
    }
}
