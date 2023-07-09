<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return [
            "wow!" => "I can't believe they found me!"
        ];
    }
}
