<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(): ResourceCollection
    {
        $users = User::with('preference')->paginate();

        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        User::create($request->validated());

        return response()->json('Usuário criado com sucesso', Response::HTTP_CREATED);
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->validated());

        return response()->json(new UserResource($user), Response::HTTP_OK);
    }
}
