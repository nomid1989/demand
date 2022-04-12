<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class Handler.
 *
 * @package App\Exceptions
 * @author DaKoshin.
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $e
     * @return Response
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response
    {
        if ($e instanceof Exception) {
            $code = $e->getCode();

            if (!$code) {
                $code = \App\Helpers\Response::HTTP_BAD_REQUEST;
            }

            if (gettype($code) === 'string') {
                $code = \App\Helpers\Response::HTTP_INTERNAL_SERVER_ERROR;
            }

            return response()->json(
                ['message' => $e->getMessage()], $code
            );
        }

        return parent::render($request, $e);
    }
}
