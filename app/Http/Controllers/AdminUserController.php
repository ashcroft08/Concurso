<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Verifica si el usuario tiene el rol 'Personal Administrativo'
        $adminRole = Role::where('name', 'Personal Administrativo')->first();

        if ($adminRole && Auth::user()->hasRole($adminRole)) {
            return redirect()->route('PersonalAdministrativo.indexAdmin');
        } else {
            return redirect('welcome'); // Redirige a la página de inicio por defecto para otros usuarios
        }
    }
}
