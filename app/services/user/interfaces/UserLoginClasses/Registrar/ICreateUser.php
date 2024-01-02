<?php

namespace App\services\user\interfaces\UserLoginClasses\Registrar;

use App\DTO\User\IDtoUser;

interface ICreateUser
{
    public function createNewUser(IDtoUser $dto);
}
