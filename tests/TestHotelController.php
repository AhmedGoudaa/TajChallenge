<?php

namespace Tests;


class TestHotelController extends \TestCase
{

    public function setUp()
    {
        parent::setUp();

        // setup mocked data source
        $this->app->singleton('Tajawal\Base\AbstractHotelDataSource', 'Tests\Mocks\MockedDataSource');
    }


    public function testResponseIsOk()
    {
        $response = $this->get('/search');

        printf($response->getResult());
        $response->assertResponseStatus(200);

    }

    public function testResponseWithByNameSearch()
    {

        $response = $this->json('GET', '/search', ['name' => 'test1']);

        printf($response->getResult());
        $response
            ->seeJsonContains([
                'city' => 'cairo',
                'name' => 'test1',
            ]);


    }

    public function testResponseWithByCitySearch()
    {

        $response = $this->json('GET', '/search', ['city' => 'cairo']);

        $response
            ->seeJsonContains([
                'city' => 'cairo',
                'name' => 'test1',
            ]);

    }

    public function testResponseWithMultiSearch()
    {

        $response = $this->json('GET', '/search', [
                'city' => 'cairo',
                'priceFrom' => 100,
                'priceTo' => 3000.5,
                'dateFrom' => '10-10-2020',
                'dateTo' => '12-10-2020']
        );

        $response
            ->seeJsonContains([
                'city' => 'cairo',
                'price' => 100.5,
                'from' => '10-10-2020',
            ]);


    }

    public function testResponseErrorsWithMultiSearch()
    {

        $response = $this->json('GET', '/search', [
                'city' => 'cairo222',
                'priceFrom' => 100,
                'priceTo' => 3000.5,
                'dateFrom' => '10-10-202022',
                'dateTo' => '12-10-2020']
        );

        $response
            ->seeJsonContains([
                'city' => ['The city may only contain letters.'],
                'dateFrom' => ['The date from does not match the format d-m-Y.',
                    'The date from is not a valid date.',
                    'The date from must be a date before date to.'
                ],
                "dateTo" => ['The date to must be a date after date from.']

            ]);


    }

}
