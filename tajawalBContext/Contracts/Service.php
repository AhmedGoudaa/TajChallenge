<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/23/18
 * Time: 7:30 PM
 */

namespace Tajawal\Contracts;


interface Service
{
    public function search(array $searchFields = []);

}