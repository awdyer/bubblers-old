<?php


namespace app\Repositories;


use App\Bubbler;

class BubblerRepository
{
    public function all() {
        return Bubbler::all()->take(10);
    }

    public function get($id) {
        return Bubbler::findOrFail($id);
    }
}