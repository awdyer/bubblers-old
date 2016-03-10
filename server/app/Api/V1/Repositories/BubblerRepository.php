<?php


namespace App\Api\V1\Repositories;

use App\Api\V1\Models\Bubbler;

class BubblerRepository
{
    public function paginated($limit = 100) {
        return Bubbler::paginate($limit);
    }

    public function get($id) {
        return Bubbler::findOrFail($id);
    }

    public function near($latitude, $longitude, $radius = null) {
        $bubblers = Bubbler::all();
        $nearbyBubblers = [];
        foreach ($bubblers as $bubbler) {
            if ($bubbler->near($latitude, $longitude, $radius)) {
                $nearbyBubblers[] = $bubbler;
            }
        }
        return $nearbyBubblers;
    }
}