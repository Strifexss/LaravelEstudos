<?php

namespace App\services\interfaces;

interface ILoginUser
{
    public function Logar(string $email, string $password, $usuario):array | null;
}
