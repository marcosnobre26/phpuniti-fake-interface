<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\DataTransferObject\UserDTO;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $user = $this->userService->create($data);

        return response()->json(new UserResource($user), 200);
    }

    public function update(Request $request, $id): JsonResponse
    {

        $data = json_decode($request->getContent(), true);

        $user = $this->userService->update($data, $id);
        return response()->json(new UserResource($user), 200);
    }
}
