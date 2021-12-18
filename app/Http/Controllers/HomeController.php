<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function blog()
    {
        $notices = Notice::where('publish', 1)->paginate(4);

        return view('blog.index', compact('notices'));
    }
}
