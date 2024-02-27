<?php

namespace App\Http\Controllers;

use App\Contracts\IUserRepository;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private IUserRepository $repository;
    public function __construct()
    {
        $this->repository = new UserRepository();
    }
    /**
     * @return JsonResponse
     */

    public function index(): JsonResponse
    {
        $users = User::all();
        return response()->json([
                'data' => $users
            ]
        );
    }


//    public function show(int $id): UserResource
//    {
//        $repository = new UserRepository();
//        $user = $repository;
//        return new UserResource($user);
//    }

    public function show(int $id): UserResource
    {
        $user = $this->repository->getUserById($id);

        return new UserResource($user);
    }


    public function destroy(int $id): JsonResponse
    {
        $user = User::query()->find($id);
        if ($user === null) {
            return response()->json([
                'message' => 'Запись не найдена'
            ]);
        }
        $user->delete();

        return response()->json([
            'message' => 'Запись удалена'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'age' => 'required|integer| min:0',
            'email' => 'required|email',
        ]);

        $user = User::query()->create($validated);
        return new UserResource($user);


    }

    public function update(Request $request, User $user): UserResource
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'age' => 'required|integer|min:0',
            'email' => 'required|email',
        ]);

        $user = User::query()->update($validated);
        return new UserResource($user);
    }
}

