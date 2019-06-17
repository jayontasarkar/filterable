<?php

namespace App\Http\Filters\Courses;

use App\Http\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class DifficultyFilter extends FilterAbstract
{
    /**
     * Mappings for database values.
     *
     * @return array
     */
    public function mappings()
    {
        return [
            'beginner' => 'beginner',
            'intermediate' => 'intermediate',
            'advanced' => 'advanced',
        ];
    }

    /**
     * Filter by course difficulty.
     *
     * @param  string $access
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function apply(Builder $builder, $value)
    {
        $value = $this->resolveFilterValue($value);

        if ($value === null) {
            return $builder;
        }

        return $builder->where('difficulty', $value);
    }
}
