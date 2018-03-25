<?php

namespace Tajawal\Infrastructure;

use Tajawal\Base\AbstractSearchRules;
use Tajawal\Contracts\Validator;
use Tajawal\Exceptions\CustomValidationException;

class ValidatorService implements Validator
{


    /**
     * Validator function
     *
     * @param $inputs
     * @param $rules
     * @throws CustomValidationException
     */
    public function validate($inputs = [], AbstractSearchRules $rules)
    {

        $validator = app()->make('validator');

        $validator = $validator->make($inputs, $rules->getRulesArray());

        if ($validator->fails())
            throw new CustomValidationException($validator->messages());


    }


}