<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Auditorio;
use App\Models\Categoria;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Services\FileUploadService;
use Carbon\Carbon;

class EventoController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function index()
    {
        $eventos = Evento::with([
                'auditorio:id,nombre', 
                'categoria:id,nombre,icono'  // Asegúrate de incluir el campo icono
            ])
            ->select('id', 'nombre', 'fecha_hora', 'auditorio_id', 'categoria_id')
            ->latest()
            ->paginate(10);

        return view('admin.eventos.index', compact('eventos'));
    }

    public function create()
    {
        $auditorios = Auditorio::select('id', 'nombre')->get();
        $categorias = Categoria::select('id', 'nombre', 'icono')->get(); // Incluye el campo icono
        return view('admin.eventos.create', compact('auditorios', 'categorias'));
    }

    public function store(StoreEventoRequest $request)
    {
        try {
            $data = $request->validated();
            $data['fecha_hora'] = Carbon::parse($data['fecha'].' '.$data['hora']);
            
            if ($request->hasFile('imagen')) {
                $data['imagen'] = $this->fileUploadService->upload(
                    $request->file('imagen'),
                    'eventos'
                );
            }

            Evento::create($data);

            return redirect()->route('admin.eventos.index')  // Asegúrate de usar el prefijo admin
                   ->with('success', 'Evento creado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear el evento: '.$e->getMessage());
        }
    }

    public function edit(Evento $evento)
    {
        $auditorios = Auditorio::select('id', 'nombre')->get();
        $categorias = Categoria::select('id', 'nombre', 'icono')->get(); // Incluye el campo icono
        return view('admin.eventos.edit', compact('evento', 'auditorios', 'categorias'));
    }

    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        try {
            $data = $request->validated();
            $data['fecha_hora'] = Carbon::parse($data['fecha'].' '.$data['hora']);
            
            if ($request->hasFile('imagen')) {
                $data['imagen'] = $this->fileUploadService->upload(
                    $request->file('imagen'),
                    'eventos',
                    $evento->imagen
                );
            }

            $evento->update($data);

            return redirect()->route('admin.eventos.index')  // Asegúrate de usar el prefijo admin
                   ->with('success', 'Evento actualizado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar el evento: '.$e->getMessage());
        }
    }

    public function destroy(Evento $evento)
    {
        try {
            $this->fileUploadService->delete($evento->imagen);
            $evento->delete();

            return redirect()->route('admin.eventos.index')  // Asegúrate de usar el prefijo admin
                   ->with('success', 'Evento eliminado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar el evento: '.$e->getMessage());
        }
    }
}