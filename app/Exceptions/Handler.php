<?php
namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        // Tangani UnauthorizedHttpException
        if ($exception instanceof UnauthorizedHttpException) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }
    
        // Default behavior
        return parent::render($request, $exception);
    }
    
}
