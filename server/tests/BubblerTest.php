<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BubblerTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * GET /api/bubblers
     *
     * Verify the structure of the returned json.
     */
    public function testIndexJsonStructure()
    {
        factory(App\Api\V1\Models\Bubbler::class, 3)->create();

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

    /**
     * GET /api/bubblers
     *
     * Latitude and Longitude are not included in the request. It should return a list of 100 bubblers.
     */
    public function testIndexWithoutLatLong()
    {
        factory(App\Api\V1\Models\Bubbler::class, 150)->create();
        $response = $this->call('GET', '/api/bubblers');

        // Check the number of elements that are returned are less than 100
        $jsonArray = json_decode($response->content(), true);
        $bubblersCount = count($jsonArray["data"]);
        $this->assertEquals(100, $bubblersCount);
    }

    /**
     * GET /api/bubblers?latitude=0&longitude=0&radius=100
     *
     * Latitude, Longitude and Radius are included in the request. It should return bubblers that are near the coords.
     */
    public function testIndexWithLatLong()
    {
        // TODO: Find a way to shorten these declarations
        factory(App\Api\V1\Models\Bubbler::class)->create(['latitude' => 0.00003, 'longitude' => 0.00003]);
        factory(App\Api\V1\Models\Bubbler::class)->create(['latitude' => 0.00001, 'longitude' => 0.00001]);
        factory(App\Api\V1\Models\Bubbler::class)->create(['latitude' => 0.00002, 'longitude' => 0.00002]);
        //factory(App\Api\V1\Models\Bubbler::class)->create(['latitude' => 90, 'longitude' => 0]);

        $response = $this->call('GET', '/api/bubblers?latitude=0&longitude=0&radius=100');

        $jsonArray = json_decode($response->content(), true);
        $bubblersCount = count($jsonArray["data"]);
        $this->assertEquals(3, $bubblersCount);
    }




}
