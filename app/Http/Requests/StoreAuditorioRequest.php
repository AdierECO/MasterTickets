<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuditorioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
            'capacidad' => 'required|integer|min:1',
            'telefono' => 'nullable|string|max:20',
            'descripcion' => 'nullable|string',
            'foto' => 'nullable|string|max:1000'
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
