<?php

namespace App;

use App\Http\Filters\Courses\CoursesFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function scopeFilter(Builder $builder, $request, array $filters = [])
    {
        return (new CoursesFilter($request))->filter($builder);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
