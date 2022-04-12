<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\DTO\Auth\AuthDTO;
use App\DTO\User\CreateUserDTO;
use App\Helpers\DeviceNames;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

/**
 * Class RegisterController.
 *
 * @package App\Http\Controllers\Api\V1\Auth
 * @author DaKoshin.
 */
class RegisterController extends BaseAuthController
{
    /**
     * Create user.
     *
     * @OA\Post(
     *     path="/api/v1/auth/register",
     *     tags={"Auth"},
     *     summary="User registration.",
     *     operationId="register",
     *     @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/CreateUserRequest")
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Registration completed successfully.",
     *          @OA\JsonContent(ref="#/components/schemas/AuthResource")
     *     ),
     *     @OA\Response(
     *          response="422",
     *          description="Validation error."
     *     )
     * )
     *
     * @param CreateUserRequest $request
     * @param UserService $userService
     * @return JsonResponse
     */
    public function register(CreateUserRequest $request, UserService $userService): JsonResponse
    {
        $user = $userService->create(
            new CreateUserDTO(
                $request->input('name'),
                $request->input('email'),
                $request->input('password'),
            )
        );
        $token = new AuthDTO(
            $this->createToken($user, DeviceNames::WEB)
        );

        return $this->dataResponse((new AuthResource($token))->toArray($request));
    }
}
