<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function courses(){
        return [
            "wow!" => "I can't believe they found me!"
        ];
    }
}
