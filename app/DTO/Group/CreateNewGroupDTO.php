<?php

namespace App\DTO\Group;

use App\Http\Requests\group\CreateNewGroupRequest;

class CreateNewGroupDTO implements IDtoGroup
{
    public function  __construct(
        public string $name,
        public string $user_id
    ){}

    public static function makeFromRequest(CreateNewGroupRequest $request)
    {
        return new self(
            $request->input("name"),
            $request->input("user_id")
        );
    }

    public function all(): array
    {
        return [
            'name' => $this->name,
            'user_id' => $this->user_id
        ];
    }
}
