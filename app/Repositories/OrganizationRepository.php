<?php

namespace App\Repositories;

use App\Contracts\IOrganizationRepository;
use App\DTO\OrganizationDTO;
use App\DTO\UserDTO;
use App\Models\Organization;
use App\Models\User;


class OrganizationRepository implements IOrganizationRepository
{
    public function getOrganizationById(int $organizationId): ?Organization
    {
        /** @var \App\Models\Organization /null $user */
        // TODO: Implement getOrganizationById() method.
        $organization = User::query()->find($organizationId);

        return $organization;
    }

    public function create(OrganizationDTO $organizationDTO): Organization
    {
        $organization = new Organization();
        $organization->name = $organizationDTO->getName();
        $organization->save();

        return $organization;
    }

    public function update($id, array $data)
    {
        $organization = Organization::find($id);
        $organization->update($data);
        return $organization;
    }

    public function destroy($id)
    {
        return Organization::destroy($id);
    }

}
