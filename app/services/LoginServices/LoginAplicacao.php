<?php

namespace App\services\LoginServices;

use App\Repositories\userRepository;
use App\services\interfaces\ILoginUser;

class LoginAplicacao implements ILoginUser
{
    public function  __construct(userRepository $repository)
    {
    }

    public function Logar(string $email, string $password, $usuario): array|null
    {
        $token = $usuario->createToken('usuarioToken')->plainTextToken;

        if ($usuario === null | $usuario->password !== $password) {
            return null;
        } else {
            if ($token) {

                return [
                    "Token" => $token,
                    "User" => $usuario
                ];
            } else {
                return $token;
            }
        }
    }
}
