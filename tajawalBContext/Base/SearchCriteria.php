<?php

namespace Tajawal\Base;


use Tajawal\Contracts\Criteria;

abstract class SearchCriteria implements Criteria
{
    /**
     * Get the filter function as callable to
     * be an input for the searchByCriteria(_) function in Tajawal\Base\Collection class
     * @return callable
     */
    public function getCallableCriteria(): callable
    {
        return array($this,'filter');
    }

    public  abstract function filter($object):bool;
}