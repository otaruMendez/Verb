<?php

/**
 * Created by PhpStorm.
 * User: tunde
 * Date: 7/18/17
 * Time: 1:23 AM
 */
class MissingRequestMetaVariableException extends Exception
{

    public function __construct($variableName, $code = 0, \Exception $previous = null) {
        $message = "Request meta-variable $variableName was not set.";
        parent::__construct($message, $code, $previous);
    }
}