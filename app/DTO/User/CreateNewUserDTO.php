<?php

namespace App\DTO\User;

use Illuminate\Http\Request;

class CreateNewUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ){}

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );
    }
}
