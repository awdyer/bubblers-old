<?php


namespace App\Api\V1\Repositories;

use App\Api\V1\Models\Bubbler;

class BubblerRepository
{
    public function all() {
        return Bubbler::all()->take(10);
    }

    public function get($id) {
        return Bubbler::findOrFail($id);
    }
}