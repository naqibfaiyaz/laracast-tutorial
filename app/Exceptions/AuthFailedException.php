<?php

namespace App\Exceptions;

use Exception;

class AuthFailedException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return response()->json([
            'message' => 'These credentials do not match our records.'
        ], 422);
    }

}