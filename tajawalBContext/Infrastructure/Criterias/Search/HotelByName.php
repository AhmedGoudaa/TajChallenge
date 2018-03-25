<?php


namespace Tajawal\Infrastructure\Criterias\Search;


use Tajawal\Base\SearchCriteria;
use Tajawal\Domain\Models\Hotel;

class HotelByName extends SearchCriteria
{

    /**
     * Target name eg: search for hotel name is Radisson blu
     * @var string
     */
    protected $target;

    /**
     * HotelByName constructor.
     * @param $target
     */
    public function __construct(string $target)
    {
        $this->target = $target;
    }

    /**
     * Filter
     * @param $object
     * @return bool
     */
    public function filter($object): bool
    {
        return $this->filterHotelByName($object);
    }

    /**
     * Check if he hotel name contains the search attribute
     * @param Hotel $hotel
     * @return bool
     */
    private function filterHotelByName(Hotel $hotel): bool
    {
        if (strpos($hotel->name, $this->target) !== false)
            return true;

        return false;
    }
}