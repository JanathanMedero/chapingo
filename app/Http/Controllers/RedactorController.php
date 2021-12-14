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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = User::where('slug', $slug)->first();

        return view('admin.redactorUsers.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
