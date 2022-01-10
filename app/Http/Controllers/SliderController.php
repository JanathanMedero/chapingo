<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $images = Slider::all();

        return view('admin.slider.index', compact('images'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('images')) 
        {
            foreach($request->file('images') as $image)
            {
                $randomSlugImg = Str::random(10);

                $extension = $image->extension();
                $nameImage = $randomSlugImg.'.'.$extension;
                $image->move(public_path().'/imagenes/slider/', $nameImage);

                Slider::create([
                    'image' => $nameImage,
                ]);
            }
            return back()->with('success', 'Imágenes agregadas correctamente');
        }else{
            return redirect()->route('slider.index')->with('info', 'No se han agregado nuevas imágenes');
        }
    }

    public function destroyImage($image)
    {
        if (file_exists(public_path('imagenes/slider/'.$image))) {
            unlink(public_path('imagenes/slider/'.$image));
        }

        Slider::where('image', $image)->delete();

        return back()->with('delete', 'Imágen eliminada correctamente');
    }

    public function destroySlider()
    {
        $images = Slider::all();

        foreach ($images as $image) {
            if (file_exists(public_path('imagenes/slider/'.$image->image))) {
                unlink(public_path('imagenes/slider/'.$image->image));
            }
        }

        Slider::truncate();

        return back()->with('delete', 'Slider eliminado correctamente');

    }
}
