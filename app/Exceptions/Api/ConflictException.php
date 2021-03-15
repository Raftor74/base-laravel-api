<?php

namespace App\Exceptions\Api;

class ConflictException extends ApiException
{
    public function render()
    {
        return response()->json($this->asArray(), 409);
    }
}
