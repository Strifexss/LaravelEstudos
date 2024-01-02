<?php

namespace App\DTO\User;

use App\Http\Requests\User\CreateUserRequest;

class CreateNewUserDTO implements IDtoUser
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

    public function  all():array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ];
    }

}
