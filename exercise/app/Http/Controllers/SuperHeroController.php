<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class SuperHeroController extends Controller
{
    public function importCsv(Request $request)
    {
        return response()->json([
            'message' => 'successfully created'
        ], Response::HTTP_CREATED);
    }
}
