<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * API check controller.
 *
 * @OA\OpenApi(
 *     @OA\Info(
 *          version="1.0.0",
 *          title="Tech task forum",
 *          description="Api documentation Tech task forum"
 *     ),
 *     @OA\Server(
 *          description="OpenApi host",
 *          url="/"
 *     ),
 *     @OA\ExternalDocumentation(
 *          description="Find out more about Swagger",
 *          url="https://swagger.io"
 *     ),
 *     @OA\PathItem(path="api")
 * ),
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      description="Authorization by login and password with obtaining an authorization token.",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT"
 * )
 *
 * @author DaKoshin
 * @package App\Http\Controllers\Api\V1
 */
final class InfoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/info",
     *     tags={"Info"},
     *     summary="Check api.",
     *     description="After the request, textual information about the success of the api will be received.",
     *     @OA\Response(
     *          response="200",
     *          description="API is working."
     *     )
     * )
     *
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return $this->successResponse('API is working!');
    }
}
