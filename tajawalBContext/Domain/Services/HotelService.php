<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/23/18
 * Time: 7:29 PM
 */

namespace Tajawal\Domain\Services;

use Tajawal\Base\BaseRepository;
use Tajawal\Contracts\CriteriaCreator;
use Tajawal\Contracts\Service;


class HotelService implements Service
{

    private $hotelRepo;
    private $criteriaCreator;

    /**
     * HotelService constructor.
     * @param $hotelRepo
     * @param $criteriaCreator
     */
    public function __construct(BaseRepository $hotelRepo , CriteriaCreator $criteriaCreator)
    {
        $this->hotelRepo = $hotelRepo;
        $this->criteriaCreator = $criteriaCreator;
    }


    public function search(array $requestFields = [])
    {
        $collection = $this->hotelRepo->get();

        if (!empty($requestFields)){

            $searchCriteria = $this->criteriaCreator->getSearchCriteria($requestFields);
            $orderCriteria = $this->criteriaCreator->getOrderCriteria($requestFields);

            if (!empty($searchCriteria))
                $collection = $collection->searchByManyCriteria($searchCriteria);

            if ($orderCriteria != null )
                $collection = $collection->orderByCriteria($orderCriteria);

        }

        return $collection;

    }


}