<?php

namespace App\Exceptions\Api;

class UnauthorizedException extends ApiException
{
    public function render()
    {
        return response()->json($this->asArray(), 401);
    }
}
