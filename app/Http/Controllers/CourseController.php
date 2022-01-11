<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('admin.courses.index', compact('courses'));
    }

    public function store(Request $request)
    {

        $slug = Str::slug($request->name);

        $response = Course::where('slug', $slug)->first();

        if (is_null($response))
        {
            $slug = Str::slug($request->name);
        }else{
            $random = Str::random(10);
            $slug = Str::slug($request->name . '-' . $random);
        }

        $image = $request->image;

        // 330x260

        $randomSlugImg = Str::random(10);

        $extension = $image->extension();
        $nameImage = $randomSlugImg.'.'.$extension;
        # $image->move(public_path().'/imagenes/carreras/'. $nameImage);

        $path = (public_path().'/imagenes/carreras/'. $nameImage);

        Image::make($image)->resize(330, 260, function ($constraint){
            $constraint->aspectRatio();
        })->save($path);


        Course::create([
            'name'          => $request->name,
            'slug'          => $slug,
            'description'   => $request->description,
            'image'         => $nameImage
        ]);

        return back()->with('success', 'Carrera agregada correctamente');
    }

    public function edit($slug)
    {
        $course = Course::where('slug', $slug)->first();

        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)->first();

        $slug = Str::slug($request->name);

        $response = Course::where('slug', $slug)->first();

        if (is_null($response))
        {
            $slug = Str::slug($request->name);
        }else{
            $random = Str::random(10);
            $slug = Str::slug($request->name . '-' . $random);
        }

        if ($request->hasFile('image')) {

            $image = $request->image;

            $randomSlugImg = Str::random(10);

            $extension = $image->extension();
            $nameImage = $randomSlugImg.'.'.$extension;

            $path = (public_path().'/imagenes/carreras/'. $nameImage);

            Image::make($image)->resize(330, 260, function ($constraint){
                $constraint->aspectRatio();
            })->save($path);

            if (file_exists(public_path('imagenes/carreras/'.$course->image))){
                unlink(public_path('imagenes/carreras/'.$course->image));
            }
        }else{
            $nameImage = $course->image;
        }

        $course->name           = $request->name;
        $course->slug           = $slug;
        $course->description    = $request->description;
        $course->image          = $nameImage;

        $course->save();

        return redirect()->route('course.index')->with('success', 'Carrera editada correctamente');

    }

    public function destroy($slug)
    {

        $course = Course::where('slug', $slug)->first();

        if (file_exists(public_path('imagenes/carreras/'.$course->image))){
            unlink(public_path('imagenes/carreras/'.$course->image));
        }

        Course::where('slug', $course->slug)->delete();

        return back()->with('delete', 'Carrera eliminada correctamente');

    }
}
