<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Park;
use App\Bubbler;


class Suburb extends Model
{
    public $timestamps = false;

    public function parks() {
        return $this->hasMany(Park::class);
    }

    public function bubblers() {
        return $this->hasManyThrough(Bubbler::class, Park::class);
    }
}
