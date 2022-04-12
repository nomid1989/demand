<?php
declare(strict_types=1);

namespace App\Http\Resources\Auth;

use App\DTO\Auth\AuthDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

/**
 * Class AuthResource.
 *
 * @OA\Schema(
 *     title="Auth resourse",
 *     @OA\Property(
 *          property="token",
 *          title="Token",
 *          type="string"
 *     )
 * )
 *
 * @package App\Http\Resources\Auth
 * @author DaKoshin.
 * @mixin AuthDTO
 */
class AuthResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    #[Pure]
    #[ArrayShape(['token' => "string"])]
    public function toArray($request = null): array
    {
        return [
            'token' => $this->getToken()
        ];
    }
}
