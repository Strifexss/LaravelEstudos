<?php

namespace App\Repositories;

use App\Models\group;

class groupRepository {

    public function createNewGroup(string $name, int $user_id) {
       return group::create([
            'name' => $name,
            "user_id" => $user_id
        ]);
    }

    public function showAllGroups() {
        return group::all();
    }
}
