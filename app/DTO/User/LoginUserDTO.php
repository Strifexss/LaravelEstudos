<?php

namespace App\DTO\User;

use App\Http\Requests\User\LoginUserRequest;

class LoginUserDTO implements IDtoUser
{
    public function __construct(
        public string $email,
        public string $password,
    ){}

    public static function makeFromRequest(LoginUserRequest $request): self
    {
        return new self(
            $request->input("email"),
            $request->input('password')
        );
    }

    public function all(): array
    {
        return [
            'email' => $this->email,
            'password'=> $this->password,
        ];
    }
}
