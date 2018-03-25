<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tajawal\Contracts\Service;


class HotelController extends Controller
{
    private $hotelService;


    public function __construct(Service $hotelService)
    {
        $this->hotelService = $hotelService;
    }


    public function search(Request $request)
    {

        $collection = $this->hotelService->search($request->all());


        $HotelsAsStr = $collection->map(function ($hotel) {

            return $hotel->toArray();
        });


        return response(json_encode(array_values($HotelsAsStr->toArray())));
    }


    //
}
