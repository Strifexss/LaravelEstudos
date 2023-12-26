<?php

namespace App\Repositories;

use App\Models\group;

class groupRepository {

    public function createNewGroup(string $name, int $userId) {
        group::create([
            'name' => $name,
            "user_id" => $userId
        ]);
    }

    public function showAllGroups() {
        return group::all();
    }
}