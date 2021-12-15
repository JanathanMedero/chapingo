<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::paginate(10);

        return view('admin.notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.notices.create');
    }

    public function store(Request $request)
    {

        $user = Auth::user();

        $random = Str::random(10);
        $randomSlugImg = Str::random(15);


        if ($request->publish == 'on') 
        {
            $request->publish = 1;
        }else
        {
            $request->publish = 0;
        }
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $nameImage = $randomSlugImg.'.'.$extension;
            $file->move(public_path().'/imagenes/noticias/', $nameImage);
        }else
        {
            $nameImage = null;
        }

        Notice::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'slug' => Str::slug($request->title.'-'.$random),
            'body' => $request->body,
            'publish' => $request->publish,
            'image' => $nameImage,
            
        ]);

        return redirect()->route('notice.index')->with('success', 'Noticia creada correctamente');

    }
}
