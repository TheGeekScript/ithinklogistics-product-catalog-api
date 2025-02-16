<?php 

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception): JsonResponse
    {
        if ($request->is('api/*')) {
            if ($exception instanceof ValidationException) {
                return response()->json([
                    'error' => 'Validation Error',
                    'messages' => $exception->errors(),
                ], 422);
            }

            if ($exception instanceof ModelNotFoundException) {
                return response()->json([
                    'error' => 'Resource Not Found',
                    'message' => 'The requested resource was not found.',
                ], 404);
            }

            if ($exception instanceof NotFoundHttpException) {
                return response()->json([
                    'error' => 'Endpoint Not Found',
                    'message' => 'Invalid API endpoint.',
                ], 404);
            }

            return response()->json([
                'error' => 'Internal Server Error',
                'message' => $exception->getMessage(),
            ], 500);
        }

        return parent::render($request, $exception);
    }
}
