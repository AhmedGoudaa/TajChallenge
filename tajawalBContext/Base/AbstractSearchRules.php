<?php

namespace Tajawal\Base;


use Tajawal\Contracts\Rules;

abstract class AbstractSearchRules implements Rules
{
    public abstract function getRulesArray():array;
}