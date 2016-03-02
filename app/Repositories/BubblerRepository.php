<?php


namespace app\Repositories;


use App\Bubbler;

class BubblerRepository
{
    public function all() {
        return Bubbler::with('park.suburb')->get();
    }

    public function get($id) {
        return Bubbler::find($id);
    }
}