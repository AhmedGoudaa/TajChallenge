<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/23/18
 * Time: 7:41 PM
 */

namespace Tajawal\Contracts;


use Tajawal\Base\Collection;

interface DataSource
{
    public function get(): Collection;
}