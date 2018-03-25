<?php

namespace Tajawal\Base;


use Tajawal\Contracts\Criteria;
use Tajawal\Domain\Models\Hotel;

abstract class OrderCriteria implements Criteria
{

    /**
     * Order type false for ascending order true from descending order
     * @var bool
     */
    private $orderType = false;

    /**
     * Get the Order function as callable to
     * be an input for the OrderByCriteria(_) function in Tajawal\Base\Collection class
     * @return callable
     */
    public function getCallableCriteria(): callable
    {
        return array($this,'byField');
    }

    /**
     * @return bool
     */
    public function getOrderType(): bool
    {
        return $this->orderType;
    }

    /**
     * @param bool $orderType
     */
    public function setOrderType(bool $orderType)
    {
        $this->orderType = $orderType;
    }

    /**
     * Return field to compare on
     * @param Hotel $hotel
     * @param $key
     * @return mixed
     */
    public  abstract function byField(Hotel $hotel, $key);




}