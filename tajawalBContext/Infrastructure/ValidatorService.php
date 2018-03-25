<?php

namespace Tajawal\Infrastructure;

use Tajawal\Base\AbstractSearchRules;
use Tajawal\Exceptions\CustomValidationException;
use Tajawal\Contracts\Validator ;

class ValidatorService implements Validator
{


    /**
     * Validator function
     *
     * @param $inputs
     * @param $rules
     * @throws CustomValidationException
     */
    public function validate($inputs = [] , AbstractSearchRules $rules)
    {

        $validator = app()->make('validator');

        $validator =$validator->make($inputs,$rules->getRulesArray());

        if ($validator->fails())
            throw new CustomValidationException($validator->messages());



    }


}