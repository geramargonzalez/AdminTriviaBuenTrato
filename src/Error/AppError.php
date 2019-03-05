<?php

namespace App\Error;

use Cake\Error\BaseErrorHandler;

class AppError extends BaseErrorHandler
{
    
    //  Abstract method: _displayError() is used when errors are triggered.
    public function _displayError($error, $debug)
    {
          $img = "<h1>There has been an error.</h1>";
          echo $img;
    }
    // Abstract method: _displayException() is called when there is an uncaught exception.
    public function _displayException($exception)
    {
        $img = "<h1> There has been an exception, MotherFucker! </h1>";
        echo $img;
    }
    // Error Handlers Convert Fatal Errors into exceptions and re-use the exception handling logic to render an error page.
    public function handleFatalError($code, $description, $file, $line)
    {
        return 'A fatal error has happened';
    }
}