<?php

namespace App\services\user\CreateNewUserServices;

use App\DTO\User\IDtoUser;
use App\Repositories\userRepository;
use App\services\user\interfaces\UserLoginClasses\Registrar\ICreateUser;

class CreateNewUserAplicacao implements ICreateUser
{
    public function  __construct(
      private userRepository $repository
    ){}


    public function createNewUser(IDtoUser $dto)
    {
        $usuario = $this->repository->createNewUser($dto->name, $dto->email, $dto->password);

        $token = $usuario->createToken('usuarioToken')->plainTextToken;

        return [
            "New User" => $usuario,
            "Token" => $token
        ];
    }
}
