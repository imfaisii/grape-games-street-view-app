<?php

namespace App\Exceptions;

use App\Traits\Jsonify;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{

    use Jsonify;

    protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->renderable(function (AuthenticationException $e, $request) {
            if ($request->is('api/*')) {
                return self::exception(
                    $e,
                    401,
                    data: ['message' => 'User not authenticated, please add token in request headers.']
                );
            }
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
