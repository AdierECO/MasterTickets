<?php

namespace App\Http\Controllers;

use App\Models\Auditorio;
use App\Http\Requests\StoreAuditorioRequest;
use App\Http\Requests\UpdateAuditorioRequest;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuditorioController extends Controller
{
    protected $fileUploadService;

    public function index()
    {
        $auditorios = Auditorio::latest()->paginate(10);
        return view('admin.auditorios.index', compact('auditorios'));
    }

    public function create()
    {
        return view('admin.auditorios.create');
    }

    public function store(StoreAuditorioRequest $request)
    {
        try {
            $data = $request->validated();

            // ⛔ Esto detiene la ejecución y muestra el contenido del array validado
            dd($data);

            Auditorio::create($data);

            return redirect()->route('admin.auditorios.index')
                ->with('success', 'Auditorio creado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear el auditorio: '.$e->getMessage());
        }
    }

    public function edit(Auditorio $auditorio)
    {
        return view('admin.auditorios.edit', compact('auditorio'));
    }

    public function update(UpdateAuditorioRequest $request, Auditorio $auditorio)
    {
        try {
            $validated = $request->validated();
            
            // Validación adicional para la URL de imagen
            $validator = Validator::make($validated, [
                'imagen_url' => 'nullable|url|starts_with:https://,http://',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $auditorio->update($validated);

            return redirect()->route('admin.auditorios.index')
                   ->with('success', 'Auditorio actualizado correctamente');

        } catch (\Exception $e) {
            return back()->withInput()
                   ->with('error', 'Error al actualizar auditorio: '.$e->getMessage());
        }
    }

   public function destroy(Auditorio $auditorio)
    {
        try {
            // Solo eliminar si la foto existe Y es un archivo local (opcional: no es URL externa)
            if ($auditorio->foto && !str_starts_with($auditorio->foto, 'http')) {
                $this->fileUploadService->delete($auditorio->foto);
            }

            $auditorio->delete();

            return redirect()->route('admin.auditorios.index')
                ->with('success', 'Auditorio eliminado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar el auditorio: '.$e->getMessage());
        }
    }


}