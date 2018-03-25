<?php

namespace Tajawal\Contracts;

use Tajawal\Base\AbstractSearchRules;

interface Validator
{

    public function validate($inputs = [] , AbstractSearchRules $rules);
}