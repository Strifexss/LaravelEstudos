<?php

namespace App\services\groups;

use App\DTO\Group\IDtoGroup;
use App\services\groups\interfaces\ICreateGroup;
use App\services\groups\interfaces\IsearchUserAllGroup;

class GroupServices
{
    public function createNewGroup(IDtoGroup $dto, ICreateGroup $createGroup)
    {
        return $createGroup->createGroup($dto);
    }

    public function searchUserAllGroups(IDtoGroup $dto, IsearchUserAllGroup $searchUserAllGroup)
    {
        return $searchUserAllGroup->searchUserAllGroups($dto);
    }
}
