<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('moderator') ) {
            abort(403, 'Accion no autorizada, no tiene los permisos para entrar a esta sección.');
        }

        $users = User::whereHas("roles", function($q){ $q->where("name", "moderator"); })->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        User::create([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ])->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'Usuario registrado correctamente');

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

        if (Auth::user()->hasRole('moderator') ) {
            abort(403, 'Accion no autorizada, no tiene los permisos para entrar a esta sección.');
        }

        $user = User::where('slug', $slug)->first();

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        
        $user = User::where('slug', $slug)->first();



        $user->name = $request->name;
        $user->email = $request->email;
        $user->syncRoles($request->role);

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');

    }

    public function updatePassword(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        $rules = [
            'password' => 'required|confirmed',
        ];

        $customMessages = [
            'required' => 'Ingrese una contraseña',
            'confirmed' => 'Las contraseñas no coinciden'
        ];

        $this->validate($request, $rules, $customMessages);

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('users.index')->with('success', 'Contraseña actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
