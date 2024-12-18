<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function register(RegisterRequest $request)
{
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);

    $token = $user->createToken('auth-token')->plainTextToken;
    $user->token = $token;

    $user->addRole(3); // Adiciona o papel de Participante

    $resource = new UserResource($user);

    return response([
        'user' => $resource,
        'redirect' => route('produtos') // Redirecionar para produtos
    ], 201); // Status 201 Created
}

    

    public function addRole(string $id, Request $request)
    {
        $data = $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::find($id);
        if($user) {
            $user->addRole($data['role_id']);
            return new UserResource($user);
        }
        return response(['error' => 'Usuário não encontrado.'], 404);
    }

    public function removeRole(string $id, Request $request)
    {
        $data = $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::find($id);
        if($user) {
            $user->removeRole($data['role_id']);
            return new UserResource($user);
        }
        return response(['error' => 'Usuário não encontrado.'], 404);
    }

    public function login(LoginRequest $request)
{
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response(['error' => 'O e-mail informado não está cadastrado.'], 401); // Unauthorized
    }

    if (Hash::check($request->password, $user->password)) {
        $token = $user->createToken('auth-token')->plainTextToken;
        $user->token = $token;

        return response([
            'user' => new UserResource($user),
            'redirect' => route('produtos'), // Redirecionar para produtos
        ], 200);
    }

    return response(['error' => 'A senha informada está incorreta.'], 401); // Unauthorized
}


    public function validateToken(Request $request)
    {
        if ($token = $request->bearerToken()) {
            $user = auth('sanctum')->user();
            $user->token = $token;
            return new UserResource($user);
        }
    }


    public function logout()
    {
        /** @var User $user */
        $user = Auth()->user();
        $user->tokens()->delete();

        return response(['message' => 'Logout realizado com sucesso.'], 200);
    }
}