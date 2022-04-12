<?php
declare(strict_types=1);

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class AuthUserRequest.
 *
 * @OA\Schema(
 *     title="User registration request.",
 *     type="object",
 *     required={"email", "password"},
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
 *     )
 * )
 *
 * @package App\Http\Requests\Users
 * @author DaKoshin.
 */
class AuthUserRequest extends FormRequest
{
    /**
     * Determinate rules.
     *
     * @return array
     */
    #[ArrayShape(
        [
            'email' => "string",
            'password' => "string"
        ]
    )]
    public function rules(): array
    {
        return [
            'email' => 'bail|required|string|max:255|email',
            'password' => 'bail|required|string|min:8|max:32'
        ];
    }
}
