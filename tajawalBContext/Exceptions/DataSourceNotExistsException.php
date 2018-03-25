<?php

namespace Tajawal\Exceptions;


class DataSourceNotExistsException extends \Exception
{

    public function getErrorMessages()
    {
        return ['errors' => $this->getErrors()];
    }

    /*
     * Getter for error messages
     */

    public function getErrors()
    {
        return [
            'Message' => 'Error while requesting data from The Data source'
        ];

    }
}