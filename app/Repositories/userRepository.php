<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class userRepository {

    public function getAllUser() {
        return User::paginate(5);
    }

    public function getEspecifiedUserById(int $id) {
        return User::where('id', $id)->first();
    }

    public function findUserByEmail(string $email) {
        return User::where('email', $email)->first();
    }

    public function createNewUser ($name, $email, $password) {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }
}
