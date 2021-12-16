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

        $uniqueSlug = Str::slug($request->name);

        $exist = User::where('slug', $uniqueSlug)->first();

        if ($exist == null) {
            User::create([
                'name'      => $request->name,
                'slug'      => Str::slug($request->name),
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
            ])->assignRole($request->role);
        }else{
            $random = Str::random(10);
            User::create([
                'name'      => $request->name,
                'slug'      => Str::slug($request->name.'-'.$random),
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
            ])->assignRole($request->role);
        }

        $user = Auth::user();

        if ( $user->hasRole('administrator') ) {
            return redirect()->route('adminUser.index')->with('success', 'Usuario registrado correctamente');   
        }else
        {
            return redirect()->route('redactor.index')->with('success', 'Usuario registrado correctamente');
        }

    }

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

        $route = url()->previous();

        if (Str::contains($route, 'administrador')) {
            return redirect()->route('adminUser.index')->with('success', 'Usuario actualizado correctamente');
        }elseif (Str::contains($route, 'moderador')){
            return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
        }else{
            return redirect()->route('redactor.index')->with('success', 'Usuario actualizado correctamente');
        }

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

        $route = url()->previous();

        if (Str::contains($route, 'administrador')) {
            return redirect()->route('adminUser.index')->with('success', 'Contraseña actualizada correctamente');
        }else{
            return redirect()->route('users.index')->with('success', 'Contraseña actualizada correctamente');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {

        $user = Auth::user();

        $count = User::role('moderator')->count();

        if ($count == 1)
        {
            return redirect()->route('users.index')->with('delete', 'No se puede eliminar el moderador, debe existir por lo menos un moderador');
        }elseif($user->slug == $slug)
        {
            return redirect()->route('user.index')->with('delete', 'No puedes eliminar a este moderador, actualmente esta en uso');
        }else
        {
            User::where('slug', $slug)->delete();

            return redirect()->route('users.index')->with('success', 'Moderador eliminado correctamente');
        }
    }
}
