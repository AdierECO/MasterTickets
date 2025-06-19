<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Muestra el perfil del usuario
     */
    public function show()
    {
        $user = Auth::user();
        $view = $user->role === 'admin' ? 'admin.perfil.show' : 'usuario.perfil.show';
        
        return view($view, compact('user'));
    }

    /**
     * Muestra el formulario de edición del perfil
     */
    public function edit()
    {
        $user = Auth::user();
        $view = $user->role === 'admin' ? 'admin.perfil.edit' : 'usuario.perfil.edit';
        
        return view($view, compact('user'));
    }

    /**
     * Actualiza la información del perfil
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'telefono' => 'nullable|string|max:20',
            'foto_perfil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'current_password' => [
                'nullable',
                'required_with:password',
                function ($attribute, $value, $fail) use ($user) {
                    if (!empty($value) && !Hash::check($value, $user->password)) {
                        $fail('La contraseña actual es incorrecta.');
                    }
                }
            ],
            'password' => 'nullable|confirmed|min:8',
        ]);

        $data = $request->only(['name', 'email', 'telefono']);
        
        // Actualizar foto de perfil si se envió
        if ($request->hasFile('foto_perfil')) {
            if ($user->foto_perfil) {
                Storage::delete($user->foto_perfil);
            }
            $data['foto_perfil'] = $request->file('foto_perfil')->store('profile-photos');
        }

        // Actualizar contraseña si se proporcionó
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('profile.show')
                         ->with('success', 'Perfil actualizado correctamente.');
    }

    /**
     * Muestra el formulario para cambiar contraseña
     */
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    /**
     * Procesa el cambio de contraseña
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed|min:8',
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Contraseña cambiada exitosamente.');
    }
}