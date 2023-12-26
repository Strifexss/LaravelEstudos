<?php

namespace App\Http\Controllers;

use App\Repositories\groupRepository;
use Illuminate\Http\Request;

class groupTaskController extends Controller
{   

    public function __construct(private groupRepository $repository) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->repository->showAllGroups();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $name = $request->input('name');
        $user_id = $request->input('user_id');
        
        $this->repository->createNewGroup($name, $user_id);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
