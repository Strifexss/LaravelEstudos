<?php

namespace App\services\groups\SearchUserGroup;

use App\DTO\Group\IDtoGroup;
use App\DTO\Group\SearchUserGroupDTO;
use App\Repositories\groupRepository;
use App\services\groups\interfaces\IsearchUserAllGroup;

class SearchUserGroupsPadrao implements IsearchUserAllGroup
{

    public function __construct(
        private groupRepository $repository
    ){}

    public function searchUserAllGroups(IDtoGroup|SearchUserGroupDTO $dto)
    {
        return $this->repository->searchAllGroupsByUserId($dto->user_id);
    }
}
