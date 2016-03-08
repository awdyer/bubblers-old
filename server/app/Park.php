<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Suburb;
use App\Bubbler;

class Park extends Model
{
    public $timestamps = false;

    public function suburb() {
        return $this->belongsTo(Suburb::class);
    }

    public function bubblers() {
        return $this->hasMany(Bubbler::class);
    }
}
