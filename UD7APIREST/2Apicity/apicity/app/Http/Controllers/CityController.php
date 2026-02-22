<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CityRequest;



class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $cities = City::all();
        return response()->json($cities, 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request): JsonResponse
    {
        $city = City::create($request->validated());

        return response()->json([
            'success' => true,
            'data' => $city
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $city = City::find($id);

        return response()->json($city, 200);
    }


    /**
     * Update the specified resource in storage.
     */
   public function update(CityRequest $request, string $id): JsonResponse
{
    $city = City::find($id);

    $city->name = $request->name;
    $city->population = $request->population;
    $city->postalcode = $request->postalcode;
    $city->save();

    return response()->json([
        'success' => true,
        'data' => $city
    ], 200);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
{
    $city = City::find($id);

    if ($city) {
        $city->delete();
    }

    return response()->json([
        'success' => true
    ], 200);
}
}
