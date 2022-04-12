<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class PostController.
 *
 * @package App\Http\Controllers\Api\V1\Posts
 * @author DaKoshin.
 */
final class PostController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/v1/posts",
     *     tags={"Posts"},
     *     summary="Create post.",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(ref="#/components/schemas/CreatePostRequest"),
     *         )
     *     ),
     *     @OA\Response(
     *          response="204",
     *          description="Post created successfuly.",
     *     ),
     *     @OA\Response(
     *          response="422",
     *          description="Validation error."
     *     )
     * )
     *
     * @param CreatePostRequest $request
     * @param PostService $postService
     * @return JsonResponse
     */
    public function create(CreatePostRequest $request, PostService $postService): JsonResponse
    {
        $postService->create(
            Auth::user(),
            $request->input('title'),
            $request->input('text'),
            $request->file('image')
        );

        return $this->successResponseWithoutContent();
    }
}
