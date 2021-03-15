<?php

namespace App\Exceptions\Api;

use Throwable;

abstract class ApiException extends \Exception
{
    protected $errors;

    public function __construct(
        string $message = "",
        array $errors = [],
        int $code = 0,
        Throwable $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }

    public function asArray()
    {
        return [
            'message' => $this->message,
            'errors' => $this->errors,
        ];
    }

    abstract public function render();
}
