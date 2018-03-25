<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/23/18
 * Time: 8:13 PM
 */

namespace Tajawal\Domain\Models;


class Availability
{

    public $from;
    public $to;

    /**
     * Availability constructor.
     * @param $from
     * @param $to
     */
    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }



}