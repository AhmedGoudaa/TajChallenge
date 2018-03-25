<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/23/18
 * Time: 7:41 PM
 */

namespace Tajawal\Infrastructure;


use Tajawal\Base\AbstractHotelDataSource;
use GuzzleHttp\Client;
use Tajawal\Base\Collection;


class HotelDataSource extends AbstractHotelDataSource
{


    /**
     * Get Hotels collection from rest api
     * @return Collection
     */
    public function get(): Collection
    {

        $response = (new Client())
                            ->requestAsync('GET', $this->getURL())
                            ->then($this->onSuccess(),$this->onError())
                            ->wait();

        return $this->mapper->map($response);

    }

    /**
     * onSuccess callback
     * @return callable
     */
    private function onSuccess():callable {

        return function($response){
            return $response->getBody()->getContents();
        };
    }

    /**
     * onError callback
     * @return callable
     */
    private function onError():callable {

        return function($response){

            // TODO:: throw exception
            return "[
                'Message' => 'Error in request',
                'hotels' => []
                ]";
        };

    }

    private function getURL() : string {
        return config('dataSource.hotelsURL');
    }





}