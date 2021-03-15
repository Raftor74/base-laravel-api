<?php

namespace App\Filters\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface QueryFilterContract
{
    public function apply(Builder $query);
}
