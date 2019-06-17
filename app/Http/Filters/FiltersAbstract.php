<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class FiltersAbstract
{
    protected $request;

    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filter(Builder $builder)
    {

        foreach ($this->getFilters() as $filter => $value) {
            $this->resolveFilter($filter)->apply($builder, $value);
        }

        return $builder;
    }

    /**
     * get the keys from filters array
     * and pluck the values from the request
     * filters them if any empty or null value is provided
     * @return [type] [description]
     */
    protected function getFilters()
    {
        return array_filter(
            $this->request->only(array_keys($this->filters))
        );
    }

    protected function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }
}
