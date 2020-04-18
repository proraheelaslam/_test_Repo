<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{

    /**
     * Override default Illuminate\Foundation\Exceptions\Handler.php->unauthenticated method
     * to solve admin, student and school redirection issues.
     */

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            // custom redirection
            return response('Please login to countinue',401);
            // default redirection
            // return response()->json(['message' => $exception->getMessage()], 401);
        }else{
            if (in_array('student', $exception->guards())) {
                return redirect('student/login');
            }elseif(in_array('school', $exception->guards()) ){
                return redirect('school/login');
            }else{
                return redirect('admin/login');
            }
        }
    }

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
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
        return parent::render($request, $exception);
    }
}
