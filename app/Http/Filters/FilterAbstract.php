<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

abstract class FilterAbstract
{
    abstract public function apply(Builder $builder, $value);

    public function mappings()
    {
        return [];
    }

    /**
     * search in mappings array keys and
     * return the value of the key if found
     * else return null
     *
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    protected function resolveFilterValue($key)
    {
        return Arr::get($this->mappings(), $key);
    }
}
