<?php
namespace App\Error;

use Cake\Error\ExceptionRenderer;


// This class is responsable de renderer excpetions
class AppExceptionRenderer extends ExceptionRenderer
{

    public function missingPregunta($error)
    {
        return "<h1>" . $error->getMessage() . " --- codigo de error:  " . $error->getCode() . " </h1> ";
    }

    // overwrite exception notFound
     public function notFound($error)
    {
       $template = "<h1>" . $error->getMessage() .  "</h1>";
       echo $template;
    }

    public function handleFatalError($code, $description, $file, $line)
    {
      return 'There is a fatal error in your request ....';
    }

}
