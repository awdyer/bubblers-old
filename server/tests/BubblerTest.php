<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BubblerTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Ensure no more than 100 bubblers are returned when the latitude and longitude are not included in the request.
     *
     * @return void
     */
    public function testIndexWithoutLatLong()
    {
        $response = $this->get('/api/bubblers');
        $response->assertResponseOk();

        // Check the number of elements that are returned are less than 100
        $jsonArray = json_decode($response->toString(), true);
        $bubblersCount = count($jsonArray);
        $this->assertLessThanOrEqual(100, $bubblersCount);
    }

    /**
     * Verify the structure of the returned json.
     */
    public function testIndexJsonStructure()
    {
        $this->get('/api/bubblers')->seeJsonStructure([
            "data" => [
                "*" => [
                    "id",
                    "description",
                    "latitude",
                    "longitude",
                    "park" => ["id", "name"],
                    "suburb" => ["id", "name"],
                    "rating"
                ]
            ]
        ]);
    }


}
