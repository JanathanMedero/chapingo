<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    
    public function index()
    {
        if (Auth::user()->hasRole('moderator') ) {
            abort(403, 'Accion no autorizada, no tiene los permisos para entrar a esta sección.');
        }

        $users = User::whereHas("roles", function($q){ $q->where("name", "administrator"); })->paginate(10);

        return view('admin.adminUsers.index', compact('users'));
    }

    public function edit($slug)
    {
        $user = User::where('slug', $slug)->first();

        return view('admin.adminUsers.edit', compact('user'));
    }

    public function destroy($slug)
    {
        $count = User::role('administrator')->count();

        if ($count == 1)
        {
            return redirect()->route('adminUser.index')->with('delete', 'No se puede eliminar el administrador, debe existir por lo menos un administrador');
        }elseif(Auth::user()->slug == $slug)
        {
            return redirect()->route('adminUser.index')->with('delete', 'No puedes eliminar a este administrador, actualmente esta en uso');
        }else
        {
            User::where('slug', $slug)->delete();

            return redirect()->route('adminUser.index')->with('success', 'Administrador eliminado correctamente');
        }
    }
}
