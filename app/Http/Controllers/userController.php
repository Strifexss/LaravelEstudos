<?php

namespace App\Http\Controllers;

use App\DTO\User\CreateNewUserDTO;
use App\DTO\User\LoginUserDTO;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\LoginUserRequest;
use App\services\user\CreateNewUserServices\CreateNewUserAplicacao;
use App\services\user\LoginServices\LoginAplicacao;
use App\services\user\UserServices;
use Illuminate\Http\JsonResponse;

class userController extends Controller
{

    public function __construct(
        private UserServices $userServices,
    ){
    }

    public function store(CreateUserRequest $request, CreateNewUserAplicacao $createUser): JsonResponse
    {
        try {

        $user = $this->userServices->createNewUser(
            CreateNewUserDTO::makeFromRequest($request),
            $createUser
        );

        return response()->json([
            "message" => "Usuario Criado",
            "User" => $user
            ]);

        }catch (\Throwable $e) {
            return response()->json("Ocorreu um erro ao criar o usuário");
        }
    }

    public function login(LoginUserRequest $request, LoginAplicacao $login): JsonResponse
    {
        try {
            $usuario = $this->userServices->loginUser(
                LoginUserDTO::makeFromRequest($request),
                $login
            );

            return response()->json(['UsuarioEncontrado' => $usuario]);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Ocorreu um erro interno.'], 500);
        }
    }
}
