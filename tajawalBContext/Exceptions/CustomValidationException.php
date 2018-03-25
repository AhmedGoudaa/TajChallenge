<?php

namespace Tajawal\Exceptions;


class CustomValidationException extends \Exception
{

    /**
     * The array of error messages
     * form laravel validator
     * @var array
     */
    private $errors;


    public function __construct($errors)
    {
        $this->errors = $errors;
    }


    public function getErrors()
    {
        return $this->errors;

    }

    /*
     * Getter for error messages
     */
    public function getErrorMessages()
    {
        return ['errors' => $this->errors];
    }
}