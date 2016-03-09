<?php

namespace App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

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
