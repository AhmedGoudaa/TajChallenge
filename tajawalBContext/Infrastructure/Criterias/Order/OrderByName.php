<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/25/18
 * Time: 1:42 AM
 */

namespace Tajawal\Infrastructure\Criterias\Order;


use Tajawal\Base\OrderCriteria;
use Tajawal\Domain\Models\Hotel;

class OrderByName extends OrderCriteria
{

    /**
     * Return hotel name to compare on
     * @param Hotel $hotel
     * @param $key
     * @return int
     */
    public function byField(Hotel $hotel,$key)
    {
        return $hotel->name;
    }


}