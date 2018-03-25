<?php
/**
 * Created by PhpStorm.
 * User: a-g
 * Date: 3/24/18
 * Time: 3:20 AM
 */

class MapperTest extends TestCase
{


    public function testMappingObjectsCount()
    {
        $mapper = $this->app->make("Tajawal\Contracts\CollectionMapper");

        $collection = $mapper->map($this->getJson());

        $this->assertEquals(1, $collection->count());
    }

    private function getJson()
    {

        return '{  "hotels": [ {
                                              "name": "Media One Hotel",
                                              "price": 102.2,
                                              "city": "dubai",
                                              "availability": [
                                                {
                                                  "from": "10-10-2020",
                                                  "to": "15-10-2020"
                                                },
                                                {
                                                  "from": "25-10-2020",
                                                  "to": "15-11-2020"
                                                },
                                                {
                                                  "from": "10-12-2020",
                                                  "to": "15-12-2020"
                                                }
                                              ]
                                            }
                                       ]
                              }';
    }


}