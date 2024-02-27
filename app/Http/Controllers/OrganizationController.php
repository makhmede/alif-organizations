<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResource;
use App\Http\Resources\UserResource;
use App\Models\Organization;
use App\Models\User;
use App\Repositories\OrganizationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index(): JsonResponse
    {
        $organizations = Organization::all();
        return response()->json([
                'data' => $organizations
            ]
        );
    }


    public function show(int $id): UserResource
    {
        $repository = new OrganizationRepository();
        $user = $repository;
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
        ]);
       $organization = Organization::query()->create($validated);
       return new OrganizationResource($organization);

    }

    public function update(Request $request, Organization $organization): OrganizationResource
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $organization = Organization::query()->update($validated);
        return new OrganizationResource($organization);
    }
}
