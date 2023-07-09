<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    public function index(){
        return Course::all();
    }

    public function show($id){
        return Course::find($id);
    }

    public function create(){
        return Course::factory()->create([
            'course_name' => request('course_name'),
            'course_teacher_name' => request('course_teacher_name'),
            'course_total_hours' => request('course_total_hours')
        ]);
    }

    public function destroy($id){
        $course = Course::find($id);

        if($course){
            $course->delete();
            return response()->json(null, 204);
        }else {
            return response()->json(['message'=>'course not found'], 404);  
        }
    }
}
