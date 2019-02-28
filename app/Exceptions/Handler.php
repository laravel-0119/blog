<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('site.auth.login'));
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof NotFoundHttpException || $exception instanceof ModelNotFoundException) {
            return response()->view('errors.default', [
                'errorCode' => 404,
                'errorMessage' => 'Страница не найдена'
            ], 404);
        }

        if ($exception instanceof HttpException) {
            if ($exception->getStatusCode() == 403) {
                return response()->view('errors.default', [
                    'errorCode' => 403,
                    'errorMessage' => 'Доступ запрещен'
                ], 403);
            } else {
                return response()->view('errors.default', [
                    'errorCode' => 500,
                    'errorMessage' => 'Внутренняя ошибка сервера'
                ], 500);
            }
        }

        if ($exception instanceof AuthorizationException) {
            return response()->view('errors.default', [
                'errorCode' => 403,
                'errorMessage' => 'Доступ запрещен'
            ], 403);
        }


        return parent::render($request, $exception);
    }
}
