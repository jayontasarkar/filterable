<?php

namespace App\Http\Filters\Courses;

use App\Http\Filters\Courses\{
	DifficultyFilter,
	AccessFilter,
	HasTakenFilter
};
use App\Http\Filters\FiltersAbstract;

class CoursesFilter extends FiltersAbstract
{
	protected $filters = [
		'difficulty' => DifficultyFilter::class,
		'access'     => AccessFilter::class,
		'completed'  => HasTakenFilter::class
	];
}