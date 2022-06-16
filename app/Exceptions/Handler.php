<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Str;

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
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            if(Str::is('*admin*', request()->path())){
                return response()->view('backend.errors.404', [], 404);
            } else {
                return response()->view('frontend.errors.404', [], 404);
            }
        }
        if ($exception instanceof \Illuminate\Auth\Access\AuthorizationException) {
            if(Str::is('*admin*', request()->path())){
                return response()->view('backend.errors.403', [], 403);
            } else {
                return response()->view('frontend.layout.403', [], 403);
            }
        }
        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            if(Str::is('*admin*', request()->path())){
                return response()->view('backend.errors.419', [], 419);
            } else {
                return response()->view('frontend.errors.419', [], 419);
            }
        }
        if ($exception instanceof \ErrorException) {
            if(Str::is('*admin*', request()->path())){
                return response()->view('backend.errors.500', [], 500);
            } else {
                return response()->view('frontend.errors.500', [], 500);
            }
        }
        if ($exception instanceof \ParseError) {
            if(Str::is('*admin*', request()->path())){
                return response()->view('backend.errors.500', [], 500);
            } else {
                return response()->view('frontend.errors.500', [], 500);
            }
        }

        return parent::render($request, $exception);
    }
}
