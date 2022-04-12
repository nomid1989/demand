<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as Code;

/**
 * Helper class for api responses.
 *
 * @package App\Helpers
 * @author DaKoshin
 */
final class Response
{
    /**
     * @var int The answer is "Successful".
     */
    const HTTP_SUCCESS = 200;

    /**
     * @var int "Created". The request was successfully completed and the resource was created as a result.
     */
    const HTTP_CREATED = 201;

    /**
     * @var int "No content." There is no content to answer the request.
     */
    const HTTP_NO_CONTENT = 204;

    /**
     * @var int "Bad request."
     * This response means that the server does not understand the request due to invalid syntax.
     */
    const HTTP_BAD_REQUEST = 400;

    /**
     * @var int "Unauthorized".
     * Authentication is required to receive the requested response.
     */
    const HTTP_UNAUTHORIZED = 401;

    /**
     * @var int "Forbidden". The client does not have access rights to the content,
     * so the server refuses to give a proper response.
     */
    const HTTP_FORBIDDEN = 403;

    /**
     * @var int "Not found". The server cannot find the requested resource.
     */
    const HTTP_NOT_FOUND = 404;

    /**
     * @var int This response is sent when a request conflicts.
     * with the current state of the server.
     */
    const HTTP_CONFLICT = 409;

    /**
     * @var int The request syntax is correct, * but the server was unable to process the content instructions.
     */
    const HTTP_UNPROCESSABLE_ENTITY = 422;

    /**
     * @var int "Internal server error".
     * The server has encountered a situation that it does not know how to handle.
     */
    const HTTP_INTERNAL_SERVER_ERROR = 500;

    /**
     * Successful API response.
     *
     * @param string|null $message
     * @param array $data
     * @param int $code
     * @return JsonResponse
     */
    public static function successResponse(
        ?string $message = null,
        array   $data = [],
        int     $code = self::HTTP_SUCCESS
    ): JsonResponse {
        $result = array_merge(
            $message ? ['message' => __($message)] : [],
            $data
        );

        return response()->json($result, $code);
    }

    /**
     * API response with an error.
     *
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public static function errorResponse(string $message, int $code = self::HTTP_NOT_FOUND): JsonResponse
    {
        return response()->json(['message' => __($message)], $code ?: Code::HTTP_BAD_GATEWAY);
    }
}
