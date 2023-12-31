<?php

namespace App\services;

use App\DTO\User\CreateNewUserDTO;
use App\DTO\User\LoginUserDTO;
use App\Repositories\userRepository;
use App\services\interfaces\UserLoginClasses\ILoginUser;

class userServices
{


    public function __construct(
        private userRepository $repository,
    )
    {
    }

    public function createNewUser(CreateNewUserDTO $dto)
    {
        return $this->repository->createNewUser($dto->name, $dto->email, $dto->password);
    }

    public function loginUser(LoginUserDTO $dto, ILoginUser $login):array | null
    {
        return $login->Logar($dto);
        }

}
