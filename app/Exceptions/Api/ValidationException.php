<?php

namespace App\Exceptions\Api;

class ValidationException extends ApiException
{
    public function render()
    {
        return response()->json($this->asArray(), 400);
    }
}
