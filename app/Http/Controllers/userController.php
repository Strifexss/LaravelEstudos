<?php

namespace App\Http\Controllers;

use App\DTO\User\CreateNewUserDTO;
use App\DTO\User\LoginUserDTO;
use App\Repositories\userRepository;
use App\services\userServices;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        private userRepository $userRepository,
        private userServices $userServices
    )
    {
    }

    public function index(Request $request) {
        return $this->userRepository->getAllUser();
    }

    public function store(Request $request)
    {
        return $this->userServices->createNewUser(CreateNewUserDTO::makeFromRequest($request));
    }

    public function show($id) {
        $id = (int) $id;
        return $this->userRepository->getEspecifiedUserById($id);
    }

    public function login(Request $request) {

        $usuario = $this->userServices->generateToken(LoginUserDTO::makeFromRequest($request));

        return Response()->json(['UsuarioEncontrado' => $usuario]) ;
    }
}
