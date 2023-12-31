<?php

namespace App\Http\Controllers;

use App\Repositories\groupRepository;
use Illuminate\Http\Request;

class groupTaskController extends Controller
{

    public function __construct(private groupRepository $repository) {
    }


    public function index()
    {
        return $this->repository->showAllGroups();
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

        $name = $request->input('name');
        $user_id = $request->input('user_id');

        if($this->repository->createNewGroup($name, $user_id)) {
            return "Usuário criado";
        }
        else {
            return "Erro ao criar usuario";
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
