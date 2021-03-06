<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {


        if ($request->ajax() || $request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }


        if (in_array('admin', explode('/', request()->url()))) {
            return redirect('/admin/login');
        }
        $data = mainResponse(false, 'api.unauthenticated', [], []);


        //return response()->json($data->original, 401);
        return redirect()->route('main')->with('error','not_authenticated');
       ;

//        return mainResponse(false, 'api.unauthenticated', [], []);
//        return response()->json(['status' => false ,'message' => __('api.unauthenticated') ]);
    }
}
