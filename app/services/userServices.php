<?php

namespace App\services;

use App\DTO\User\CreateNewUserDTO;
use App\DTO\User\LoginUserDTO;
use App\Repositories\userRepository;

class userServices
{

    public function __construct(private userRepository $repository)
    {
    }

    public function createNewUser(CreateNewUserDTO $dto)
    {
        return $this->repository->createNewUser($dto->name, $dto->email, $dto->password);
    }

    public function generateToken(LoginUserDTO $dto):string | null
    {
        $usuario = $this->repository->findUserByEmail($dto->email);

        if($usuario === null | $usuario->password !== $dto->password) {
            return null;
        }
        else  {

            return $usuario->createToken('usuarioToken')->plainTextToken;

        }

    }
}
