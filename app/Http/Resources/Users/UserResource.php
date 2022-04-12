<?php
declare(strict_types=1);

namespace App\Http\Resources\Users;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class UserResource.
 *
 * @package App\Http\Resources\Users
 * @author DaKoshin.
 * @mixin User
 */
class UserResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    #[ArrayShape(
        [
            'id' => "int",
            'name' => "string",
            'email' => "string",
            'email_verified_at' => "\Illuminate\Support\Carbon|null",
            'password' => "string",
            'remember_token' => "null|string",
            'created_at' => "\Illuminate\Support\Carbon|null",
            'updated_at' => "\Illuminate\Support\Carbon|null",
            'notifications_count' => "int"
        ]
    )]
    public function toArray($request = null): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password,
            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'notifications_count' => $this->notifications_count,
        ];
    }
}
