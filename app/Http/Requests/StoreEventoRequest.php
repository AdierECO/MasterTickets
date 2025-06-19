<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEventoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            'auditorio_id' => [
                'required',
                'integer',
                Rule::exists('auditorios', 'id')
            ],
            'categoria_id' => [
                'required',
                'integer',
                Rule::exists('categorias', 'id')
            ],
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'precio' => 'required|numeric|min:0',
            'capacidad' => 'required|integer|min:1'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'fecha.after_or_equal' => 'La fecha debe ser igual o posterior a hoy.',
            'hora.date_format' => 'El formato de hora debe ser HH:MM.',
            'auditorio_id.exists' => 'El auditorio seleccionado no es válido.',
            'categoria_id.exists' => 'La categoría seleccionada no es válida.',
            'imagen.max' => 'La imagen no debe pesar más de 2MB.',
            'precio.min' => 'El precio no puede ser negativo.',
            'capacidad.min' => 'La capacidad debe ser al menos 1.'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'precio' => str_replace(',', '.', $this->precio)
        ]);
    }
}