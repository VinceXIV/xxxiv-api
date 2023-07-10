<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Response;
use Laravel\Sanctum\PersonalAccessToken;


class CourseController extends Controller
{
    public function index(){
        // auth('sanctum')->user() returns the user who is currently authorized
        // Find more info here; https://laracasts.com/discuss/channels/laravel/get-user-by-token
        return auth('sanctum')->user()->courses;
    }

    public function show($id){
        $course = auth('sanctum')->user()->courses->find($id);

        if($course){
            return $course;
        }else {
            return response()->json(['message'=>'course not found'], 404);
        }
    }

    public function create(){
        // Get the currently authorized user
        // Again, see https://laracasts.com/discuss/channels/laravel/get-user-by-token
        $user = auth('sanctum')->user();

        return Course::factory()->create([
            'course_name' => request('course_name'),
            'course_teacher_name' => request('course_teacher_name'),
            'course_total_hours' => request('course_total_hours'),
            'user_id' => $user->id
        ]);
    }

    public function destroy($id){
        $course = auth('sanctum')->user()->courses->find($id);

        if($course){
            $course->delete();
            return response()->json(null, 204);
        }else {
            return response()->json(['message'=>'course not found'], 404);  
        }
    }

    public function update($id){
        $course = auth('sanctum')->user()->courses->find($id);

        if($course){

            $updated_course_name = request('course_name')? request('course_name') : $course->course_name;
            $updated_teacher_name = request('course_teacher_name')? request('course_teacher_name') : $course->course_teacher_name;
            $updated_hours = intval(request('course_total_hours')? request('course_total_hours') : $course->course_total_hours);

            $course->course_name = $updated_course_name;
            $course->course_teacher_name = $updated_teacher_name;
            $course->course_total_hours = $updated_hours;

            $course->save();

            return response()->json($course, 202);
        }else {
            return response()->json(['message'=>'course not found'], 404);  
        }        
    }
}
