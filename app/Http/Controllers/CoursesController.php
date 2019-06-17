<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
    	$courses = Course::filter($request)->get();

    	return $courses;
    }
}
