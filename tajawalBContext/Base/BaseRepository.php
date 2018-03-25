<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/23/18
 * Time: 7:52 PM
 */

namespace Tajawal\Base;


use Tajawal\Contracts\DataSource;
use Tajawal\Contracts\Repository;

abstract class BaseRepository implements Repository
{

    public function get(): Collection
    {
        return $this->getDataSource()->get();
    }

    public abstract function getDataSource(): DataSource;


}