<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Notice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function create($slug)
    {
        $notice = Notice::where('slug', $slug)->first();

        return view('admin.notices.gallery', compact('notice'));
    }

    public function store(Request $request, $slug)
    {

        $notice = Notice::where('slug', $slug)->first();

        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('images')) {

            foreach($request->file('images') as $image)
            {
                $randomSlugImg = Str::random(10);

                $extension = $image->extension();
                $nameImage = $randomSlugImg.'.'.$extension;
                $image->move(public_path().'/imagenes/noticias/galeria/', $nameImage); 

                Gallery::create([
                    'notice_id' => $notice->id,
                    'image'      => $nameImage,
                ]);
            }

            return redirect()->route('notice.index')->with('success', 'Galería creada correctamente');

        }

    }

}

