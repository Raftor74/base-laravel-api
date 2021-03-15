<?php

namespace App\Exceptions\Api;

class ForbiddenException extends ApiException
{
    public function render()
    {
        return response()->json($this->asArray(), 403);
    }
}
