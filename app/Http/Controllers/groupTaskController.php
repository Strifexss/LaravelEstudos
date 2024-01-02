<?php

namespace App\Http\Controllers;

use App\DTO\Group\CreateNewGroupDTO;
use App\Http\Requests\group\CreateNewGroupRequest;
use App\Repositories\groupRepository;
use App\services\groups\CreateNewGroupService\CreateGroupPadrao;
use App\services\groups\GroupServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class groupTaskController extends Controller
{

    public function __construct(
        private GroupServices $services,
        private CreateGroupPadrao $createGroupPadrao,
        private CreateNewGroupRequest $request,
        private groupRepository $repository
    ) {
    }


    public function index()
    {
        return $this->repository->showAllGroups();
    }

    public function create()
    {

    }

    public function store():JsonResponse
    {
        try {
            $newGroup = $this->services->createNewGroup(
                CreateNewGroupDTO::makeFromRequest($this->request),
                $this->createGroupPadrao
            );
            return response()->json([
                "newGroup" => $newGroup
            ]);
        }catch (\Throwable $e) {
            return response()->json(["erro" => "Ocorreu um erro ao criar o grupo"]);
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
