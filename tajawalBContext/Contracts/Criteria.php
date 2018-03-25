<?php

namespace Tajawal\Contracts;


interface Criteria
{
    public function getCallableCriteria(): callable;
}