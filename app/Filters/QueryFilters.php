<?php

namespace App\Filters;

use App\Filters\Contracts\IsShouldRun;
use App\Filters\Contracts\QueryFilterContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class QueryFilters extends Collection implements QueryFilterContract
{
    public function apply(Builder $query)
    {
        $this->filter(function (QueryFilterContract $filter) {
            if ($filter instanceof IsShouldRun) {
                return $filter->shouldRun();
            }

            return true;
        })->each(function (QueryFilterContract $filter) use ($query) {
            $filter->apply($query);
        });
    }
}
