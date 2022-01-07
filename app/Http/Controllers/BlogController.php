<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Notice;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($slug)
    {
        $notice = Notice::where('slug', $slug)->first();

        $latestNotices = Notice::all()->except($notice->id)->take(4);

        $gallery = Gallery::where('notice_id', $notice->id)->get();

        return view('blog.show', compact('notice', 'latestNotices', 'gallery'));
    }
}
