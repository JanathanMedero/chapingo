<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $images = Slider::all();

        return view('index', compact('images'));
    }

    public function blog()
    {
        $notices = Notice::where('publish', 1)->paginate(4);

        return view('blog.index', compact('notices'));
    }
}
