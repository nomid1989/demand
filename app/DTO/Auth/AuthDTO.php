<?php
declare(strict_types=1);

namespace App\DTO\Auth;

/**
 * Class AuthDTO.
 *
 * @package App\DTO\Auth
 * @author DaKoshin.
 */
final class AuthDTO
{
    /**
     * @var string Auth token.
     */
    private string $token;

    /**
     * AuthDTO constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     * @see AuthDTO::$token
     */
    public function getToken(): string
    {
        return $this->token;
    }
}
