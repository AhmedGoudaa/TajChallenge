<?php


class CriteriaCreatorTest extends TestCase
{

    protected $criteriaCreator;

    public function setUp()
    {
        parent::setUp();
        $this->criteriaCreator = $this->app->make("Tajawal\Contracts\CriteriaCreator");
    }

    private function getMockedRequestQueryData():array {

        return [
            'name'=>'test',
            'priceFrom'=>10,
            'priceTo'=>20,
            'dateFrom'=>'10-10-2020',
            'dateTo'=>'20-10-2020',
            'orderBy' => 'name',
            'orderType'=>'desc'
        ];
    }


    /**
     * Test number of search criteria is 3 for [name , date => [from,to] , price => [from , to]]
     */
    public function testNumberOfSearchCriteria()
    {

        $searchCriteria = $this->criteriaCreator->getSearchCriteria($this->getMockedRequestQueryData());

        $this->assertEquals(3,count($searchCriteria));

    }


    /**
     * Test that there is an order criteria for order by name
     */
    public function testOrderCriteriaIsNotEmpty()
    {
        $orderCriteria = $this->criteriaCreator->getOrderCriteria($this->getMockedRequestQueryData());

        $this->assertNotNull($orderCriteria);

    }

    /**
     * Test the order type is desc that is represent true
     */
    public function testOrderCriteriaOrderType()
    {

        $orderCriteria = $this->criteriaCreator->getOrderCriteria($this->getMockedRequestQueryData());

        // order is desc then the orderType should be true
        $this->assertTrue($orderCriteria->getOrderType());

    }

}
