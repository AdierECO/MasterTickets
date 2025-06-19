<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuditorioRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ajusta según necesites control de acceso
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'nullable|string|max:100',
            'capacidad' => 'required|integer|min:1',
            'telefono' => 'nullable|string|max:20',
            'descripcion' => 'nullable|string',
            'foto' => 'nullable|string|max:1000' // Asumiendo que usas URL para foto
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del auditorio es obligatorio',
            'capacidad.min' => 'La capacidad debe ser al menos 1',
            'foto.url' => 'La foto debe ser una URL válida',
        ];
    }
}
