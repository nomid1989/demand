<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

/**
 * Base controller.
 *
 * @package App\Http\Controllers
 * @author DaKoshin.
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Successful API response.
     *
     * @param string|null $message
     * @param array $data
     * @param int $code
     * @return JsonResponse
     */
    protected function successResponse(
        ?string $message = null,
        array $data = [],
        int $code = Response::HTTP_SUCCESS
    ): JsonResponse {
        return Response::successResponse($message, $data, $code);
    }

    /**
     * Successful response with data.
     *
     * @param array $data
     * @param array $additional
     * @return JsonResponse
     */
    protected function dataResponse(array $data = [], array $additional = []): JsonResponse
    {
        return Response::successResponse(
            null,
            array_merge(isset($data['data']) ? $data : ['data' => $data], $additional),
            Response::HTTP_SUCCESS
        );
    }

    /**
     * Successful API response with no content.
     *
     * @return JsonResponse
     */
    protected function successResponseWithoutContent(): JsonResponse
    {
        return Response::successResponse(null, [], Response::HTTP_NO_CONTENT);
    }

    /**
     * API response with an error.
     *
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    protected function errorResponse(string $message, int $code = Response::HTTP_NOT_FOUND): JsonResponse
    {
        return Response::errorResponse($message, $code);
    }
}
