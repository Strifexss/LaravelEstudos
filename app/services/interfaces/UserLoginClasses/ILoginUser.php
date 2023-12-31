<?php

namespace App\services\interfaces\UserLoginClasses;

use App\Interfaces\IDtoUser;

interface ILoginUser
{
    public function Logar(IDtoUser $dto):array | null;
}
