<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\DTO\Auth\AuthDTO;
use App\Helpers\DeviceNames;
use App\Http\Requests\Users\AuthUserRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use LogicException;

/**
 * Class LoginController.
 *
 * @package App\Http\Controllers\Api\V1\Auth
 * @author DaKoshin.
 */
final class LoginController extends BaseAuthController
{
    /**
     * @OA\Post(
     *     path="/api/v1/auth/login",
     *     tags={"Auth"},
     *     summary="User login.",
     *     operationId="login",
     *     @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/AuthUserRequest")
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Login completed successfully.",
     *          @OA\JsonContent(ref="#/components/schemas/AuthResource")
     *     ),
     *     @OA\Response(
     *          response="422",
     *          description="Validation error."
     *     )
     * )
     *
     * @param AuthUserRequest $request
     * @param UserService $userService
     * @return JsonResponse
     */
    public function login(AuthUserRequest $request, UserService $userService): JsonResponse
    {
        $user = $userService->getUserByEmail($request->input('email'));

        if (! $user || ! Hash::check($request->input('password'), $user->password)) {
            throw new LogicException('The provided credentials are incorrect.');
        }

        $token = new AuthDTO(
            $this->createToken($user, DeviceNames::WEB)
        );

        return $this->dataResponse((new AuthResource($token))->toArray($request));
    }
}
