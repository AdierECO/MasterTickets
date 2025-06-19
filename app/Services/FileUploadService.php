<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    public function upload($file, $directory, $oldFile = null)
    {
        // Eliminar archivo anterior si existe
        if ($oldFile) {
            $this->delete($oldFile);
        }

        // Guardar el nuevo archivo
        return $file->store($directory, 'public');
    }

    public function delete($filePath)
    {
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return true;
        }
        return false;
    }
}