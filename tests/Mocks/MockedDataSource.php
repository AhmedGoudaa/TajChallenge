<?php

namespace Tests\Mocks;

use Tajawal\Base\AbstractHotelDataSource;
use Tajawal\Base\Collection;
use Tajawal\Domain\Models\Availability;
use Tajawal\Domain\Models\Hotel;

class MockedDataSource extends AbstractHotelDataSource
{
    public function get(): Collection
    {
        $hotelsArr =
            [

                new Hotel('test3', 300.5, 'new york',
                    [
                        new Availability('10-10-2020', '12-10-2020'),
                        new Availability('20-10-2020', '30-10-2020'),
                        new Availability('10-11-2020', '12-11-2020')
                    ]
                ),
                new Hotel('test1', 100.5, 'cairo',
                    [
                        new Availability('10-10-2020', '12-10-2020'),
                        new Availability('20-10-2020', '30-10-2020'),
                        new Availability('10-11-2020', '12-11-2020')
                    ]
                ),
                new Hotel('test5', 500.5, 'cairo',
                    [
                        new Availability('10-10-2020', '17-10-2020'),
                        new Availability('20-10-2020', '30-10-2020'),
                        new Availability('10-11-2020', '12-11-2020')
                    ]
                ),
                new Hotel('test2', 200.5, 'london',
                    [
                        new Availability('12-10-2020', '19-10-2020'),
                        new Availability('20-10-2020', '30-10-2020'),
                        new Availability('11-11-2020', '15-11-2020')
                    ]
                )

            ];

        return new Collection($hotelsArr);
    }


}