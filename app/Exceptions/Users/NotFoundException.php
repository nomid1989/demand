<?php
declare(strict_types=1);

namespace App\Exceptions\Users;

use App\Helpers\Response;
use InvalidArgumentException;
use JetBrains\PhpStorm\Pure;

/**
 * Class NotFoundException.
 *
 * @package App\Exceptions\Users
 * @author DaKoshin.
 */
final class NotFoundException extends InvalidArgumentException
{
    /**
     * NotFoundException constructor.
     */
    #[Pure]
    public function __construct()
    {
        parent::__construct('User not found', Response::HTTP_NOT_FOUND);
    }
}
