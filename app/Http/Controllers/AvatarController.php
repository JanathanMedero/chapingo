<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function store(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        $randomSlugImg = Str::random(15);

        if ($request->hasFile('image')) {
            if (file_exists(public_path('imagenes/avatars/'.$user->avatar))) {
                unlink(public_path('imagenes/avatars/'.$user->avatar));
            }
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $nameImage = $randomSlugImg.'.'.$extension;
            $file->move(public_path().'/imagenes/avatars/', $nameImage);

            $user->avatar = $nameImage;
            $user->save();

            return redirect()->route('users.index')->with('success', 'Foto de perfil actualizada correctamente');

        }elseif ( $user->avatar != null )
        {
            $user->avatar = $user->avatar;
            $user->save();
            return redirect()->route('users.index')->with('success', 'Foto de perfil actualizada correctamente');

        }else{
            $user->avatar = null;
            return redirect()->route('users.index')->with('success', 'Foto de perfil actualizada correctamente');
        }
    }
}
