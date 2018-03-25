<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/23/18
 * Time: 7:29 PM
 */

namespace Tajawal\Infrastructure;


use Tajawal\Base\Collection;
use Tajawal\Contracts\CollectionMapper;
use Tajawal\Domain\Models\Availability;
use Tajawal\Domain\Models\Hotel;

class HotelCollectionMapper implements CollectionMapper
{


    /**
     * Map json array to collection
     * @param string $items
     * @return Collection
     */
    public function map(string $items): Collection
    {

        $hotelJson = json_decode($items,true);

        return $this->fromJsonArray($hotelJson['hotels']);
    }


    /**
     * Helper function that map json array to my collection of hotel object
     * @param array $jsonArray
     * @return Collection
     */
    private function fromJsonArray(array $jsonArray) : Collection {

        $hotels = [];

        foreach ($jsonArray as $json){

            $name                = $json["name"];
            $price               = $json["price"];
            $city                = $json["city"];
            $availabilityJsonArr = $json["availability"];

            $availabilityArr = [];

            foreach ($availabilityJsonArr as $avail){
                $availabilityArr [] = new Availability($avail["from"],$avail["to"]);
            }

            $hotels[] = new Hotel($name,(float)$price,$city,$availabilityArr );

        }


        return new Collection($hotels);

    }


}