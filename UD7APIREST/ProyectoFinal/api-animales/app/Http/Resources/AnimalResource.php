<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre_animal' => $this->name, // Ejemplo de renombrar campo
            'especie' => $this->species,
            'edad' => $this->age,
            'contacto_dueno' => $this->owner_email,
            'foto' => $this->image_path ? asset('storage/' . $this->image_path) : null,
            'fecha_registro' => $this->created_at->format('d-m-Y')
        ];
    }
}
