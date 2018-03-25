<?php

namespace Tajawal\Infrastructure\Criterias\Search;


use Tajawal\Base\SearchCriteria;
use Tajawal\Domain\Models\Hotel;

/**
 * Hotels by availability dates
 * Class HotelByDate
 * @package Tajawal\Infrastructure\Criterias
 */
class HotelByDate extends SearchCriteria
{


    /**
     * Target date range [ from =>10-10-2020 ,to=>15-10-2020 ]
     * @var float
     */
    protected $target;

    /**
     * HotelByDate constructor.
     * @param $target
     */
    public function __construct(array $target)
    {
        $this->target = $target;
    }


    public function filter($object): bool
    {
        return $this->filterHotelByDate($object);
    }


    /**
     * Search hotel availability based on it's range of availabilities
     * @param Hotel $hotel
     * @return bool
     */
    private function filterHotelByDate(Hotel $hotel): bool
    {
        foreach ($hotel->availability as $range) {

            $from = strtotime($this->target['from']);
            $to = strtotime($this->target['to']);

            if (strtotime($range->from) <= $from && strtotime($range->to) >= $to)
                return true;

        }
        return false;

    }

}