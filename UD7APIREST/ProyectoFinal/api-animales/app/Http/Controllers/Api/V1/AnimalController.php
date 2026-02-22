<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Http\Requests\AnimalRequest;
use App\Http\Resources\AnimalResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalController extends Controller
{
    // Mostrar todos los animales
    public function index(): JsonResource
    {
        return AnimalResource::collection(Animal::all());
    }

    // Crear un animal
    public function store(AnimalRequest $request): JsonResponse
    {
        $data = $request->validated();
        
        // Simulación de tratamiento de imagen (lo profundizaremos luego)
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('animals', 'public');
        }

        $animal = Animal::create($data);
        return response()->json([
            'success' => true,
            'data' => new AnimalResource($animal)
        ], 201);
    }

    // Mostrar uno solo
    public function show(Animal $animal): AnimalResource
    {
        return new AnimalResource($animal);
    }

    // Actualizar
    public function update(AnimalRequest $request, Animal $animal): JsonResponse
    {
        $animal->update($request->validated());
        return response()->json([
            'success' => true,
            'data' => new AnimalResource($animal)
        ], 200);
    }

    // Eliminar
    public function destroy(Animal $animal): JsonResponse
    {
        $animal->delete();
        return response()->json(['success' => true], 204);
    }
}