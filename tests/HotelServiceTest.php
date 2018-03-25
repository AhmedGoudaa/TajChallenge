<?php


class HotelServiceTest extends TestCase
{

    protected $dataSource;
    protected $hotelService;

    public function setUp()
    {
        parent::setUp();

        // setup mocked data source
        $this->app->singleton('Tajawal\Base\AbstractHotelDataSource', 'Tests\Mocks\MockedDataSource');
        $this->app->singleton('Tajawal\Contracts\Service', 'Tajawal\Domain\Services\HotelService');

        $this->hotelService = $this->app->make('Tajawal\Contracts\Service');
    }


    /**
     * Test search for  hotel name 'test1' exists
     */
    public function testSearchResultForName()
    {
        $searchResult = $this->hotelService->search(['name' => 'test1']);

        $this->assertEquals(1, $searchResult->count());
    }

    /**
     * Test search for hotel city 'cairo' exists
     */
    public function testSearchResultForCity()
    {
        $searchResult = $this->hotelService->search(['city' => 'cairo']);

        $this->assertEquals(2, $searchResult->count());
    }


    /**
     * Test search for hotel price range from 100 to 300.5
     */
    public function testSearchResultForPriceRange()
    {
        $searchResult = $this->hotelService->search(['priceFrom' => 100, 'priceTo' => 300.5]);

        $this->assertEquals(3, $searchResult->count());
    }


    /**
     * Test search for hotel date range from 10-10-2020 to 12-10-2020
     */
    public function testSearchResultForAvailabilitiesDateRange()
    {
        $searchResult = $this->hotelService->search(['dateFrom' => '10-10-2020', 'dateTo' => '12-10-2020']);

        $this->assertEquals(3, $searchResult->count());
    }


    /**
     * Test ranges search  price and date range
     */
    public function testRangeSearch()
    {
        $searchResult = $this->hotelService->search([
                'priceFrom' => 100,
                'priceTo' => 3000.5,
                'dateFrom' => '10-10-2020',
                'dateTo' => '12-10-2020']
        );

        $this->assertEquals(3, $searchResult->count());
    }

    /**
     * Test search by name ,city , price range and date range
     */
    public function testAllSearchCriteriaTogether()
    {
        $searchResult = $this->hotelService->search([
                'name' => 'test1',
                'priceFrom' => 100,
                'priceTo' => 3000.5,
                'dateFrom' => '10-10-2020',
                'dateTo' => '12-10-2020']
        );

        $this->assertEquals(1, $searchResult->count());
    }

    /**
     * Test Order by name in ascending order where hotel name = 'test1' is first
     */
    public function testOrderByName()
    {
        $searchResult = $this->hotelService->search([
                'orderBy' => 'name',
                'orderType' => 'asc'
            ]
        );
        $array = array_values($searchResult->toArray());

        $this->assertEquals('test1', $array[0]->name);
    }


    /**
     * Test Order by price in descending order where hotel price = 500.5  is first
     */
    public function testOrderByPrice()
    {
        $searchResult = $this->hotelService->search([
                'orderBy' => 'price',
                'orderType' => 'desc'
            ]
        );
        $array = array_values($searchResult->toArray());

        $this->assertEquals(500.5, $array[0]->price);
    }


    /**
     * Test Order by price in descending order where hotel price = 500.5  is first
     */
    public function testMultiSearchWithOrderByPrice()
    {
        $searchResult = $this->hotelService->search([
                'priceFrom' => 100,
                'priceTo' => 300.5,
                'dateFrom' => '10-10-2020',
                'dateTo' => '12-10-2020',
                'orderBy' => 'price',
                'orderType' => 'desc'
            ]
        );
        $array = array_values($searchResult->toArray());

        $this->assertEquals(300.5, $array[0]->price);
        $this->assertEquals('test3', $array[0]->name);
    }


}
