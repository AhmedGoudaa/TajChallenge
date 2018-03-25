<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/23/18
 * Time: 7:29 PM
 */

namespace Tajawal\Domain\Services;

use Tajawal\Base\AbstractSearchRules;
use Tajawal\Base\BaseRepository;
use Tajawal\Contracts\CriteriaCreator;
use Tajawal\Contracts\Service;
use Tajawal\Contracts\Validator;


class HotelService implements Service
{

    private $hotelRepo;
    private $criteriaCreator;
    private $requestDataValidator;
    private $searchRules;


    /**
     * HotelService constructor.
     * @param $hotelRepo
     * @param $criteriaCreator
     * @param $requestDataValidator
     * @param $searchRules
     */
    public function __construct(BaseRepository $hotelRepo ,
                                CriteriaCreator $criteriaCreator,
                                Validator $requestDataValidator , AbstractSearchRules $searchRules)
    {
        $this->hotelRepo = $hotelRepo;
        $this->criteriaCreator = $criteriaCreator;
        $this->requestDataValidator = $requestDataValidator;
        $this->searchRules = $searchRules;
    }


    public function search(array $requestFields = [])
    {
        $collection = $this->hotelRepo->get();

        $this->requestDataValidator->validate($requestFields , $this->searchRules);

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