<?php

namespace App\services\groups\interfaces;

use App\DTO\Group\IDtoGroup;
use App\Http\Requests\group\CreateNewGroupRequest;

interface ICreateGroup
{
    public function createGroup(IDtoGroup $dtoGroup):array;
}
