<?php

namespace App\Exception;

use Cake\Core\Exception\Exception;


class MissingPreguntaException extends Exception
{
	protected $_defaultCode = 404;
    
    public function __construct($message = null, $code = null, $previous = null)
    {
        if (empty($message)) {
            $message = 'The request is missing ...';
        }
        parent::__construct($message, $code, $previous);
    }
}
