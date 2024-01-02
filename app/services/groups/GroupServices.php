<?php

namespace App\services\groups;

use App\DTO\Group\IDtoGroup;
use App\services\groups\interfaces\ICreateGroup;

class GroupServices
{
    public function createNewGroup(IDtoGroup $dto, ICreateGroup $createGroup)
    {
        return $createGroup->createGroup($dto);
    }
}
