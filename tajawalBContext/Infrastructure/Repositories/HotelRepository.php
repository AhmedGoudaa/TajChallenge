<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/24/18
 * Time: 1:11 AM
 */

namespace Tajawal\Infrastructure\Repositories;


use Tajawal\Base\AbstractHotelDataSource;
use Tajawal\Base\BaseRepository;
use Tajawal\Contracts\DataSource;

class HotelRepository extends BaseRepository
{

    private $dataSource;

    /**
     * HotelRepository constructor.
     * @param AbstractHotelDataSource $hotelDataSource
     */
    public function __construct(AbstractHotelDataSource $hotelDataSource)
    {
        $this->dataSource = $hotelDataSource;
    }


    public function getDataSource(): DataSource
    {
        return $this->dataSource;
    }


}