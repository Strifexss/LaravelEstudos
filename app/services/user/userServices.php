<?php

namespace App\services\user;

use App\DTO\User\CreateNewUserDTO;
use App\DTO\User\LoginUserDTO;
use App\services\user\interfaces\UserLoginClasses\Login\ILoginUser;
use App\services\user\interfaces\UserLoginClasses\Registrar\ICreateUser;

class userServices
{
    public function createNewUser(CreateNewUserDTO $dto, ICreateUser $createUser)
    {
        return $createUser->createNewUser($dto);
    }

    public function loginUser(LoginUserDTO $dto, ILoginUser $login):array | null
    {
        return $login->Logar($dto);
        }

}
