<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class RedactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('redactor') ) {
            abort(403, 'Accion no autorizada, no tiene los permisos para entrar a esta sección.');
        }

        $users = User::whereHas("roles", function($q){ $q->where("name", "redactor"); })->paginate(10);

        return view('admin.redactorUsers.index', compact('users'));
    }

    public function edit($slug)
    {
        $user = User::where('slug', $slug)->first();

        return view('admin.redactorUsers.edit', compact('user'));
    }

    public function destroy($slug)
    {

        $user = User::where('slug', $slug)->first();

        if(Auth::user()->slug == $slug)
        {
            return redirect()->route('redactor.index')->with('delete', 'No puedes eliminar a este redactor, actualmente esta en uso');
        }else
        {
            User::where('slug', $slug)->delete();

            return redirect()->route('redactor.index')->with('success', 'Redactor eliminado correctamente');
        }
    }
}
