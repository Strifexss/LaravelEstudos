<?php

namespace App\Http\Controllers;

use App\DTO\User\CreateNewUserDTO;
use App\DTO\User\LoginUserDTO;
use App\Http\Requests\User\LoginUserRequest;
use App\Services\LoginServices\LoginAplicacao;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        private UserServices $userServices,
        private LoginAplicacao $loginAplicacao,
        private LoginUserRequest $loginUserRequest
    ){}

    public function store(Request $request)
    {
        return $this->userServices->createNewUser(CreateNewUserDTO::makeFromRequest($request));
    }

    public function login(LoginUserRequest $loginUserRequest)
    {
        $validator = validator($loginUserRequest->all(), $loginUserRequest->rules(), $loginUserRequest->messages());

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $usuario = $this->userServices->loginUser(
                LoginUserDTO::makeFromRequest($loginUserRequest),
                $this->loginAplicacao
            );

            return response()->json(['UsuarioEncontrado' => $usuario]);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Ocorreu um erro interno.'], 500);
        }
    }
}
