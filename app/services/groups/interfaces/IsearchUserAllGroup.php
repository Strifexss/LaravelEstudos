<?php

namespace App\services\groups\interfaces;

use App\DTO\Group\IDtoGroup;

interface IsearchUserAllGroup
{
    public function searchUserAllGroups(IDtoGroup $dto);
}
