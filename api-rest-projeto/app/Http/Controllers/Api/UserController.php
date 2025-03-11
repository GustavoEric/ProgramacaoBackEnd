<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        // Validação dos dados de entrada
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Verifica se o email existe
        $user = User::where('email', $validated['email'])->first();

        // Se o usuário não existe ou a senha está incorreta
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json(['message' => 'Credenciais inválidas.'], 401);
        }

        // Cria um token para o usuário
        $token = $user->createToken('YourAppName')->plainTextToken;

        // Retorna o token no response
        return response()->json([
            'message' => 'Login bem-sucedido.',
            'token' => $token
        ]);
    }
    public function store(UserRequest $request)
    {
        try{
        // Criptografa a senha
        $requestData = $request->validated();
        $requestData['password'] = Hash::make($requestData['password']);

        // Cria o usuário
        $user = User::create($requestData);

        return response()->json([
            'message' => 'Cliente cadastrado com sucesso!',
            'data' => $user
        ], 201);
    }
    catch(Exception $exception){
        return response()->json([
            'message'=> 'Erro ao cadastrar usuario',
            'erro' => $exception
        ],404);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
