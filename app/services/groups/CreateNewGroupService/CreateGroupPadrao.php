<?php

namespace App\services\groups\CreateNewGroupService;

use App\DTO\Group\CreateNewGroupDTO;
use App\DTO\Group\IDtoGroup;
use App\Repositories\groupRepository;
use App\services\groups\interfaces\ICreateGroup;

class CreateGroupPadrao implements ICreateGroup
{

    public function __construct(
      private groupRepository $repository
    ){}

    public function createGroup(IDtoGroup|CreateNewGroupDTO $dto): array
    {
        $newGroup = $this->repository->createNewGroup($dto->name, $dto->user_id);
        return [
            "newGroup" => $newGroup
        ];
    }
}
