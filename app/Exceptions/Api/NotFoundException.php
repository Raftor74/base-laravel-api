<?php

namespace App\Exceptions\Api;

class NotFoundException extends ApiException
{
    public function render()
    {
        return response()->json($this->asArray(), 404);
    }
}
