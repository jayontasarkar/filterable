<?php

namespace App\Http\Filters\Courses;

use App\Http\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class AccessFilter extends FilterAbstract
{
    /**
     * Mappings for database values.
     *
     * @return array
     */
    public function mappings()
    {
        return [
            'free' => true,
            'premium' => false,
        ];
    }

    /**
     * Filter by course access type (free, premium).
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

        return $builder->where('free', $value);
    }
}
