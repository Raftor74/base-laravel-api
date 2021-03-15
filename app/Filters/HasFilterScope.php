<?php

namespace App\Filters;

use App\Filters\Contracts\QueryFilterContract;
use Illuminate\Database\Eloquent\Builder;

trait HasFilterScope
{
    public function scopeApplyFilter(Builder $query, QueryFilterContract $filter)
    {
        return $filter->apply($query);
    }
}
