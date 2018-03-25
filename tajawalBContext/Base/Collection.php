<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/23/18
 * Time: 7:54 PM
 */

namespace Tajawal\Base;

use Tajawal\Contracts\Criteria;

class Collection extends \Illuminate\Support\Collection
{

    /**
     * Collection constructor.
     * Create a new collection
     * @param array $items
     */
    public function __construct($items = [])
    {
        $this->items = $this->getArrayableItems($items);
    }

    /**
     * Search by
     * @param Criteria $criteria
     * @return static
     */
    public function searchByCriteria(Criteria $criteria){
        return $this->filter($criteria->getCallableCriteria());
    }

    /**
     * Search by many criteria eg : search by name & search by price
     * @param array $criterias
     * @return Collection
     */
    public function searchByManyCriteria(array $criterias)
    {
        $result = $this;

        foreach ($criterias as $criteria)
            $result = $result->searchByCriteria($criteria);

        return $result;
    }

    public function orderByCriteria(OrderCriteria $orderCriteria)
    {
        return $this->sortBy($orderCriteria->getCallableCriteria(), SORT_REGULAR , $orderCriteria->getOrderType());
    }
}