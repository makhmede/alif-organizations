<?php

namespace App\Contracts;

use App\Models\Organization;

interface IOrganizationRepository
{
    public function getOrganizationById(int $organizationId): ?Organization;

}
