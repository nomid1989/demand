<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

/**
 * Class PostService.
 *
 * @package App\Services
 * @author DaKoshin.
 */
final class PostService
{
    /**
     * @var ImageService Image service.
     */
    private ImageService $imageService;

    /**
     * PostService constructor.
     */
    public function __construct()
    {
        $this->imageService = resolve(ImageService::class);
    }

    /**
     * Create post.
     *
     * @param User $user
     * @param string $title
     * @param string $text
     * @param UploadedFile|null $image
     */
    public function create(User $user, string $title, string $text, ?UploadedFile $image): void
    {
        DB::beginTransaction();

        $post = new Post();
        $imageId = null;

        if ($image)
            $imageId = $this->imageService->store($image)->id;

        $post->user_id = $user->id;
        $post->image_id = $imageId;
        $post->title = $title;
        $post->text = $text;

        $post->save();

        DB::commit();
    }
}
