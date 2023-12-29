<?php

namespace App\services;

use App\DTO\User\CreateNewUserDTO;
use App\DTO\User\LoginUserDTO;
use App\Repositories\userRepository;
use App\services\interfaces\ILoginUser;

class userServices
{

    public function __construct(private userRepository $repository)
    {
    }

    public function createNewUser(CreateNewUserDTO $dto)
    {
        return $this->repository->createNewUser($dto->name, $dto->email, $dto->password);
    }

    public function generateToken(LoginUserDTO $dto, ILoginUser $login):array | null
    {

        $usuario = $this->repository->findUserByEmail($dto->email);


        return $login->Logar($dto->email, $dto->password, $usuario);

        /*if($usuario === null | $usuario->password !== $dto->password) {
            return null;
        }
        else {
            if ($token) {

                return [
                    "Token" => $token,
                    "User" => $usuario
                ];
            } else {
                return $token;
            }
        }*/
        }

}
