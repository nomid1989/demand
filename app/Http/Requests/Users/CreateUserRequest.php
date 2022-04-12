<?php
declare(strict_types=1);

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class CreateUserRequest.
 *
 * @OA\Schema(
 *     title="User registration request.",
 *     type="object",
 *     required={"name", "email", "password", "password_confirmation"},
 *     @OA\Property(
 *          property="name",
 *          description="Username.",
 *          type="string",
 *          example="TestUserName"
 *     ),
 *     @OA\Property(
 *          property="email",
 *          description="Email.",
 *          type="string",
 *          example="test@gmail.com"
 *     ),
 *     @OA\Property(
 *          property="password",
 *          description="Password.",
 *          type="string",
 *          example="12345678"
 *     ),
 *     @OA\Property(
 *          property="password_confirmation",
 *          description="Password confirmation.",
 *          type="string",
 *          example="12345678"
 *     )
 * )
 *
 * @package App\Http\Requests\Users
 * @author DaKoshin.
 */
class CreateUserRequest extends FormRequest
{
    /**
     * Determinate rules.
     *
     * @return array
     */
    #[ArrayShape(
        [
            'name' => "string",
            'email' => "string",
            'password' => "string"
        ]
    )]
    public function rules(): array
    {
        return [
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|max:255|email|unique:users',
            'password' => 'bail|required|string|max:255|confirmed|min:8|max:32',
        ];
    }
}
