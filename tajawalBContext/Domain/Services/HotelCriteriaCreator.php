<?php


namespace Tajawal\Domain\Services;

use Tajawal\Base\OrderCriteria;
use Tajawal\Base\SearchCriteria;
use Tajawal\Contracts\CriteriaCreator;
use Tajawal\Infrastructure\Criterias\Order\OrderByName;
use Tajawal\Infrastructure\Criterias\Order\OrderByPrice;
use Tajawal\Infrastructure\Criterias\Search\HotelByCity;
use Tajawal\Infrastructure\Criterias\Search\HotelByDate;
use Tajawal\Infrastructure\Criterias\Search\HotelByName;
use Tajawal\Infrastructure\Criterias\Search\HotelByPrice;

class HotelCriteriaCreator implements CriteriaCreator
{

    /**
     * get search criteria base in user inputs fields like name ,price ...
     * @param array $searchFields
     * @return array
     */
    public function getSearchCriteria(array $searchFields):array
    {
        $criteria = [];


        $searchFields = $this->groupRanges($searchFields,'price');
        $searchFields = $this->groupRanges($searchFields,'date');

        foreach ($searchFields as $key => $val){

            $searchCriteria = $this->matchSearchKey($key, $val);

            if ($searchCriteria != null)
                $criteria [] = $searchCriteria;

        }

        return $criteria;
    }


    /**
     * GroupRanges group from and to the searching field
     *  eg: searchFields has priceFrom=>1 , priceTo=>2 . Group them in price => [from=>1, to=>2]
     * @param array $searchFields
     * @param string $key
     * @return array
     */
    private function groupRanges(array $searchFields, string $key):array
    {

        if (isset($searchFields[$key.'From']) && isset($searchFields[$key.'To'])){
            $searchFields[$key] = ['from'=>$searchFields[$key.'From'] , 'to'=>$searchFields[$key.'To']];
            unset($searchFields[$key.'From'],$searchFields[$key.'To']);
        }


        return $searchFields;
    }


    /**
     * Match
     * @param string $key
     * @param $val
     * @return SearchCriteria
     */
    private function matchSearchKey(string $key , $val){

        switch ($key){

            case 'name' : return new HotelByName($val);
            case 'price': return new HotelByPrice($val);
            case 'city': return new HotelByCity($val);
            case 'date': return new HotelByDate($val);
            default : return null;

        }
    }


    /**
     * Get order criteria for hotels base on name or price
     * the default is order by name
     * @param array $fields
     * @return OrderCriteria
     */
    public function getOrderCriteria(array $fields)
    {
        $orderCriteria= null;

        // check for orderBy  [name , price ]
        if (isset($fields['orderBy'])){

            $orderCriteria = $this->createOrderingCriteria($fields);

            //Check for order type [asc, desc] default is asc
            if (isset($fields['orderType'])){

                if ($fields['orderType'] == 'desc'){
                    // set orderType = true for descending order
                    $orderCriteria->setOrderType( true);
                }
            }
        }

            return $orderCriteria;
    }

    /**
     * Create ordering Criteria
     * @param array $fields
     * @return OrderByName|OrderByPrice
     */
    private function createOrderingCriteria(array $fields)
    {
        switch ($fields['orderBy']) {
            case 'price' :
                return new OrderByPrice();

            default      :
                return new OrderByName();
        }
    }

}