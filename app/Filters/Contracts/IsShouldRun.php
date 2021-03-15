<?php

namespace App\Filters\Contracts;

interface IsShouldRun
{
    public function shouldRun(): bool;
}
