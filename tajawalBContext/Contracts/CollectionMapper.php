<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/23/18
 * Time: 9:11 PM
 */

namespace Tajawal\Contracts;

use Tajawal\Base\Collection;

interface CollectionMapper
{
    public function map(string $items):Collection;

}