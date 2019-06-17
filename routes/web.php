<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('courses', 'CoursesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 courses
 	- name
 	- slug
 	- description
 	- free (boolean)
 	- difficulty (beginner, intermediate, advanced)

users
	- name
	- email
	- password

course_user
	course_id
	user_id
 */

/**
$courses = (new \App\Course)->newQuery();
if ($request->has('difficulty')) {
	$courses->where('difficulty', $request->difficulty);
}
if ($request->has('access')) {
	// convert to boolean before querying
	$difficulty = $request->access === 'free' ? 1 : 0;
	$courses->where('access', $request->difficulty);
}
$courses->get();
*/
