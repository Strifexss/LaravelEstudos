<?php

namespace App\Http\Controllers;

use App\DTO\Group\CreateNewGroupDTO;
use App\DTO\Group\SearchUserGroupDTO;
use App\Http\Requests\group\CreateNewGroupRequest;
use App\Http\Requests\group\searchUserGroupsRequest;
use App\Repositories\groupRepository;
use App\services\groups\CreateNewGroupService\CreateGroupPadrao;
use App\services\groups\GroupServices;
use App\services\groups\SearchUserGroup\SearchUserGroupsPadrao;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class groupTaskController extends Controller
{

    public function __construct(
        private GroupServices $services,
        private groupRepository $repository
    ) {
    }


    public function index()
    {
        return ["data" => $this->repository->showAllGroups()];
    }

    public function create()
    {

    }

    public function searchUserGroups(searchUserGroupsRequest $request, SearchUserGroupsPadrao $searchUserGroupsPadrao)
    {
            $groups = $this->services->searchUserAllGroups(
                SearchUserGroupDTO::makeFromRequest($request),
                $searchUserGroupsPadrao
            );
            return response()->json([
                "data" => $groups
            ]);


    }

    public function store(CreateNewGroupRequest $request, CreateGroupPadrao $createGroupPadrao):JsonResponse
    {
        try {
            $newGroup = $this->services->createNewGroup(
                CreateNewGroupDTO::makeFromRequest($request),
                $createGroupPadrao
            );
            return response()->json([
                "newGroup" => $newGroup
            ]);
        }catch (\Throwable $e) {
            return response()->json(["erro" => "Ocorreu um erro ao criar o grupo"], 500);
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
