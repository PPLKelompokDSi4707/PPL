<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['sometimes', 'string', 'in:wisatawan,admin,super_admin'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation failed.', [
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'] ?? 'wisatawan',
        ]);

        $token = Auth::guard('api')->login($user);

        if (! is_string($token)) {
            return $this->errorResponse('Failed to generate authentication token.', [], 500);
        }

        return $this->respondWithToken(
            $token,
            'User registered successfully.',
            ['user' => $user],
            201
        );
    }

    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation failed.', [
                'errors' => $validator->errors(),
            ], 422);
        }

        $credentials = $validator->validated();

        if (! $token = Auth::guard('api')->attempt($credentials)) {
            return $this->errorResponse('Invalid email or password.', [], 401);
        }

        return $this->respondWithToken(
            $token,
            'Login successful.',
            ['user' => Auth::guard('api')->user()]
        );
    }

    public function me(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Authenticated user retrieved successfully.',
            'data' => [
                'user' => Auth::guard('api')->user(),
            ],
        ]);
    }

    public function logout(): JsonResponse
    {
        Auth::guard('api')->logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout successful.',
            'data' => [],
        ]);
    }

    protected function respondWithToken(
        string $token,
        string $message,
        array $data = [],
        int $status = 200
    ): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => array_merge($data, [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => (int) config('jwt.ttl', 60) * 60,
            ]),
        ], $status);
    }

    protected function errorResponse(
        string $message,
        array $data = [],
        int $status = 400
    ): JsonResponse {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
