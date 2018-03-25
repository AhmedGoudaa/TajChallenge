<?php


namespace Tajawal\Contracts;


use Tajawal\Base\OrderCriteria;

interface CriteriaCreator
{

    /**
     * Get search criteria based on user inputs fields like firstName, lastName ...
     * @param array $fields
     * @return array of Criteria
     */
    public function getSearchCriteria(array $fields): array;

    /**
     * Get order criteria based on user inputs like order by name and in descending order
     * @param array $fields
     * @return OrderCriteria
     */
    public function getOrderCriteria(array $fields);
}