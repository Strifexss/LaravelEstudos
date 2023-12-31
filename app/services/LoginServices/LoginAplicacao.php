<?php

namespace App\services\LoginServices;

use App\DTO\User\LoginUserDTO;
use App\Interfaces\IDtoUser;
use App\Repositories\userRepository;
use App\services\interfaces\UserLoginClasses\ILoginUser;

class LoginAplicacao implements ILoginUser
{
    public function  __construct(userRepository $repository)
    {
        $this->repository = $repository;
    }

    public function Logar(LoginUserDTO|IDtoUser $dto): array|null
    {
        $usuario = $this->repository->findUserByEmail($dto->email);

        if ($usuario === null | $usuario->password !== $dto->password) {
            return null;
        } else {

            $token = $usuario->createToken('usuarioToken')->plainTextToken;

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
