<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property User $resource
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

public function toArray(Request $request): array
{
    return [
        'id' => $this->id,
        'name' => $this->name,
        'surname' => $this->surname,
        'email' => $this->email,
    ];
}
}
