<?php

namespace App\DTO\User;

use App\Http\Requests\User\CreateUserRequest;
use Illuminate\Http\Request;

class CreateNewUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ){}

    public static function makeFromRequest(CreateUserRequest $request): self
    {
        return new self(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );
    }
}
