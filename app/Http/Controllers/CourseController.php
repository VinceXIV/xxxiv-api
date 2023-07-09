<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{
    public function index(){
        return Course::all();
    }

    public function show($id){
        return Course::find($id);
    }
}
