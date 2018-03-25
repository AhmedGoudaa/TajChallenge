<?php

namespace Tajawal\Infrastructure\Criterias\Search;


use Tajawal\Base\SearchCriteria;
use Tajawal\Domain\Models\Hotel;

class HotelByPrice extends SearchCriteria
{


    /**
     * Target price range [ from =>1 ,to=>2 ]
     * @var float
     */
    protected $target;

    /**
     * HotelByPrice constructor.
     * @param $target
     */
    public function __construct(array $target)
    {
        $this->target = $target;
    }


    public function filter($object): bool
    {
        return $this->filterHotelByPrice($object);
    }


    private function filterHotelByPrice(Hotel $hotel): bool
    {
        return ($hotel->price >= $this->target['from'] && $hotel->price <= $this->target['to']);
    }

}