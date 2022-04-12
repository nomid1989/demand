<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

/**
 * Base auth controller.
 *
 * @package App\Http\Controllers\Api\V1\Auth
 * @author DaKoshin.
 */
class BaseAuthController extends Controller
{
    /**
     * Create auth token by user.
     *
     * @param User $user
     * @param string $deviceName
     * @return string
     */
    public function createToken(User $user, string $deviceName): string
    {
        $user->tokens()->delete();

        return $user->createToken($deviceName)->plainTextToken;
    }
}
