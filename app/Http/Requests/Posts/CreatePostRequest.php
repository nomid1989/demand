<?php
declare(strict_types=1);

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class CreatePostRequest.
 *
 * @OA\Schema(
 *     title="Create post request.",
 *     type="object",
 *     required={"title", "text"},
 *     @OA\Property(
 *          property="title",
 *          description="Title.",
 *          type="string",
 *          maxLength=255
 *     ),
 *     @OA\Property(
 *          property="text",
 *          description="The text of the problem.",
 *          type="string",
 *          maxLength=3000
 *     ),
 *     @OA\Property(
 *          property="image",
 *          type="file",
 *          title="Post image",
 *          nullable=true
 *     )
 * )
 *
 * @package App\Http\Requests\Posts
 * @author DaKoshin.
 */
class CreatePostRequest extends FormRequest
{
    /**
     * Determinate rules.
     *
     * @return array
     */
    #[ArrayShape(['title' => "string", 'text' => "string", 'image' => "Illuminate\\Http\\UploadedFile|null"])]
    public function rules(): array
    {
        return [
            'title' => 'bail|required|string|max:255',
            'text' => 'bail|required|string|max:3000',
            'image' => 'bail|nullable|image'
        ];
    }
}
