<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ResponseTrait;

    public function register(RegisterRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
           $credentials = $request->validated();
            $credentials['password'] = Hash::make($credentials['password']);
            $user = User::create($credentials);
            DB::commit();
            return $this->successResponse([
                'user' => $user,
                'token' => $user->createToken('API Token')->plainTextToken
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        $remember = $request->get('remember');
        if(! Auth::attempt($credentials, isset($remember))) {
            return $this->errorResponse('Invalid credentials');
        }
        $user = Auth::user();
        return $this->successResponse([
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        return response()->json('logout api');
    }
}
