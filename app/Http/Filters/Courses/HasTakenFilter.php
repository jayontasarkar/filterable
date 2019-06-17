<?php

namespace App\Http\Filters\Courses;

use App\Http\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class HasTakenFilter extends FilterAbstract
{
    /**
     * Mappings for database values.
     *
     * @return array
     */
    public function mappings()
    {
        return [
            'true' => true,
            'false' => false,
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

        $method = $value ? 'whereHas' : 'whereDoesntHave';

        return $builder->{$method}('users', function ($builder) {
            $builder->whereIn('users.id', [auth()->id()]);
        });
    }
}
