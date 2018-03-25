<?php

namespace Tajawal\Infrastructure\Criterias\Order;


use Tajawal\Base\OrderCriteria;
use Tajawal\Domain\Models\Hotel;

class OrderByPrice extends OrderCriteria
{
    /**
     * @param Hotel $hotel
     * @param $key
     * @return float
     */
    public function byField(Hotel $hotel, $key)
    {
        return $hotel->price;
    }


}