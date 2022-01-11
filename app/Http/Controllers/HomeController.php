<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Notice;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $images = Slider::all();

        $courses = Course::all();

        return view('index', compact('images', 'courses'));
    }

    public function blog()
    {
        $notices = Notice::where('publish', 1)->paginate(4);

        return view('blog.index', compact('notices'));
    }
}
