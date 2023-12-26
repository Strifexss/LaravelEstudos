<?php

namespace App\DTO\User;

use Illuminate\Http\Request;

class LoginUserDTO
{
    public function __construct(
        public string $email,
        public string $password,
    ){}

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->input('email'),
            $request->input('password'),
        );
    }
}
