<?php

namespace App\Repositories;

use App\Models\user;
use Illuminate\Http\Request;

class userRepository {

    public function getAllUser() {
        return user::paginate(5);
    }

    public function getEspecifiedUserById($id) {
        return user::where('id', $id)->first();
    }

    public function findUserByEmail(string $email) {
        return user::where('email', $email)->first();
    }

    public function getAuthToken(Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $tokens = $user->tokens;

        $latestToken = $tokens->last();

        $accessToken = $latestToken->plainTextToken;

        return $accessToken;
    }

    public function createNewUser ($name, $email, $password) {
        return user::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }
}
