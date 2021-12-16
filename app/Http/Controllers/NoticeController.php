<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticeRequest;
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

    public function store(StoreNoticeRequest $request)
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

    public function edit($slug)
    {
        $notice = Notice::where('slug', $slug)->first();

        return view('admin.notices.edit', compact('notice'));
    }


    public function update(Request $request, $slug)
    {

        $notice = Notice::where('slug', $slug)->first();

        $notice->title = $request->title;
        $notice->subtitle = $request->subtitle;

        if ($request->publish == 'on') {
            $notice->publish = 1;
        }else{
            $notice->publish = 0;
        }

        $notice->body = $request->body;

        if ($request->hasFile('image')) {

            if ($notice->image == null) {
                $randomSlugImg = Str::random(15);
                $extension = $request->file('image')->extension();
                $file = $request->file('image');
                $nameImage = $randomSlugImg.'.'.$extension;
                $file->move(public_path().'/imagenes/noticias/', $nameImage);
                $notice->image = $nameImage;
            }
            else{ 
                file_exists(public_path('imagenes/noticias/'.$notice->image));
                unlink(public_path('imagenes/noticias/'.$notice->image));
                $randomSlugImg = Str::random(15);
                $extension = $request->file('image')->extension();
                $file = $request->file('image');
                $nameImage = $randomSlugImg.'.'.$extension;
                $file->move(public_path().'/imagenes/noticias/', $nameImage);
                $notice->image = $nameImage;
            }
        }

        $notice->save();
            
        return redirect()->route('notice.index')->with('success', 'Noticia actualizada correctamente');
    }

    public function deleteImage($slug)
    {
        $notice = Notice::where('slug', $slug)->first();

        if (file_exists(public_path('imagenes/noticias/'.$notice->image))) {
            unlink(public_path('imagenes/noticias/'.$notice->image));

            $notice->image = null;
            $notice->save();
        }
        return redirect()->route('notice.index')->with('success', 'Imágen eliminada correctamente');
    }

    public function destroy($slug)
    {
        $notice = Notice::where('slug', $slug)->first();

        if (file_exists(public_path('imagenes/noticias/'.$notice->image))) {
            unlink(public_path('imagenes/noticias/'.$notice->image));
        }

        $notice->delete();

        return redirect()->route('notice.index')->with('success', 'Noticia eliminada correctamente');
    }
}
