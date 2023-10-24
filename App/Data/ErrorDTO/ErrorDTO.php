<?php

namespace App\Data\ErrorDTO;

class ErrorDTO
{
    private $message;
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }


}