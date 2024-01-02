<?php

namespace App\services\user\interfaces\UserLoginClasses\Login;

use App\DTO\User\IDtoUser;

interface ILoginUser
{
    public function Logar(IDtoUser $dto):array | null;
}
