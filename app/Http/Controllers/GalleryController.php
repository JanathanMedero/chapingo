<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryRequest;
use App\Models\Gallery;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function create($slug)
    {
        $notice = Notice::where('slug', $slug)->first();

        return view('admin.notices.gallery', compact('notice'));
    }

    public function store(StoreGalleryRequest $request, $slug)
    {

        $notice = Notice::where('slug', $slug)->first();

        if ($request->hasFile('images')) {

            foreach($request->file('images') as $image)
            {
                $randomSlugImg = Str::random(10);

                $extension = $image->extension();
                $nameImage = $randomSlugImg.'.'.$extension;
                $image->move(public_path().'/imagenes/noticias/galeria/', $nameImage); 

                Gallery::create([
                    'notice_id' => $notice->id,
                    'image'     => $nameImage,
                ]);
            }

            return redirect()->route('notice.index')->with('success', 'Galería creada correctamente');

        }else{
            return redirect()->route('notice.index')->with('info', 'Galería no creada, no se han cargado imágenes');
        }

    }

    public function destroyImage($image)
    {
        if (file_exists(public_path('imagenes/noticias/galeria/'.$image))) {
            unlink(public_path('imagenes/noticias/galeria/'.$image));
        }

        Gallery::where('image', $image)->delete();

        return back()->with('delete', 'Imágen eliminada correctamente');
    }

    public function destroyGallery($id)
    {
        $images = Gallery::where('notice_id', $id)->get();

        foreach ($images as $image) {
            if (file_exists(public_path('imagenes/noticias/galeria/'.$image->image))) {
                unlink(public_path('imagenes/noticias/galeria/'.$image->image));
            }
            Gallery::where('image', $image->image)->delete();
        }

        return back()->with('delete', 'Galería eliminada correctamente');

    }

}

