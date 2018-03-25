<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/23/18
 * Time: 7:37 PM
 */

namespace Tajawal\Contracts;


use Tajawal\Base\Collection;

interface Repository
{

    /**
     * @return DataSource
     */
    public function getDataSource(): DataSource;


    /**
     * Get or list all element
     * @return Collection
     */
    public function get(): Collection;


    /*
     * rest of repo func
     */

}