<?php

namespace App\View\Components;

use App\Models\Course;
use Illuminate\View\Component;

class Courses extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $courses = Course::all();

        return view('components.courses', compact('courses'));
    }
}
