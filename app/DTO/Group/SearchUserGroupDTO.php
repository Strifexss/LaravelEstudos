<?php

namespace App\DTO\Group;

use App\Http\Requests\group\searchUserGroupsRequest;
use Illuminate\Support\Facades\Request;

class SearchUserGroupDTO implements IDtoGroup
{
    public function __construct(
      public int $user_id
    ){}

    public static function makeFromRequest(searchUserGroupsRequest $request)
    {
        return new self(
            $request->input("user_id")
        );
    }

    public function all():array
    {
        return [
            "user_id" => $this->user_id
        ];
    }
}
