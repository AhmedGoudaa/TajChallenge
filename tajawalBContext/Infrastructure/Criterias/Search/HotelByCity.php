<?php


namespace Tajawal\Infrastructure\Criterias\Search;


use Tajawal\Base\SearchCriteria;
use Tajawal\Domain\Models\Hotel;

class HotelByCity extends SearchCriteria
{

    /**
     * Target City eg: search for hotels in cairo
     * @var string
     */
    protected $target;

    /**
     * HotelByCity constructor.
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
        return $this->filterHotelByCity($object);
    }


    private function filterHotelByCity(Hotel $hotel): bool
    {
        return $hotel->city === $this->target;
    }
}