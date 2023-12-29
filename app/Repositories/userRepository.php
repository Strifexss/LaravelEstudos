<?php

namespace App\Repositories;

use App\Models\user;
use Illuminate\Http\Request;

class userRepository {

    public function getAllUser() {
        return user::paginate(5);
    }

    public function getEspecifiedUserById(int $id) {
        return user::where('id', $id)->first();
    }

    public function findUserByEmail(string $email) {
        return user::where('email', $email)->first();
    }

    public function createNewUser ($name, $email, $password) {
        return user::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }
}
