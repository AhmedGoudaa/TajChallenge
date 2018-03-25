<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/23/18
 * Time: 7:34 PM
 */

namespace Tajawal\Domain\Models;


use Tajawal\Contracts\Model;

class Hotel implements Model
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var float
     */
    public $price;

    /**
     * @var string
     */
    public $city;

    /**
     * @var array
     */
    public $availability;

    /**
     * Hotel constructor.
     * @param $name
     * @param $price
     * @param $city
     * @param $availability
     */
    public function __construct(string $name, float $price, string $city, array $availability = [])
    {
        $this->name = $name;
        $this->price = $price;
        $this->city = $city;
        $this->availability = $availability;
    }


    public function toArray(): array
    {
        return json_decode(json_encode($this), TRUE);
    }


}