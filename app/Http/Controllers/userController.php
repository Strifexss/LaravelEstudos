<?php

namespace App\Http\Controllers;

use App\DTO\User\CreateNewUserDTO;
use App\DTO\User\LoginUserDTO;
use App\Repositories\userRepository;
use App\services\LoginServices\LoginAplicacao;
use App\services\userServices;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(

        private userServices $userServices,
        private LoginAplicacao $loginAplicacao
    ){}

    public function store(Request $request)
    {
        return $this->userServices->createNewUser(CreateNewUserDTO::makeFromRequest($request));
    }

    public function login(Request $request) {

        $usuario = $this->userServices->generateToken(LoginUserDTO::makeFromRequest($request), $this->loginAplicacao);

        return Response()->json(['UsuarioEncontrado' => $usuario]) ;
    }
}
