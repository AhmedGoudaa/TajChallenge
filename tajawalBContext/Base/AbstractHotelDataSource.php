<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/24/18
 * Time: 1:38 AM
 */

namespace Tajawal\Base;


use Tajawal\Contracts\DataSource;
use Tajawal\Contracts\CollectionMapper;

abstract class AbstractHotelDataSource implements DataSource
{

    protected $mapper;

    /**
     * AbstractHotelDataSource constructor.
     * @param CollectionMapper $mapper
     */
    public function __construct(CollectionMapper $mapper)
    {
            $this->mapper = $mapper;
    }

    abstract public function get(): Collection;


}