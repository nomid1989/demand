<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Image;
use Illuminate\Http\UploadedFile;

/**
 * Class ImageService.
 *
 * @package App\Services
 * @author DaKoshin.
 */
final class ImageService
{
    /**
     * Store images.
     *
     * @param UploadedFile $image
     * @return Image
     */
    public function store(UploadedFile $image): Image
    {
        return Image::create([
            'path' => $image->store('public/images')
        ]);
    }
}
